<?php

namespace App\Http\Controllers\Clinic;

use App\Http\Controllers\Controller;

use App\Models\Clinic\LabQueue;
use App\Models\Clinic\Queue;
use App\Models\Clinic\LabRequest;
use App\Models\Clinic\LabResult;
use App\Models\Clinic\Medication;
use App\Models\Clinic\MedicalRecord;
use App\Models\Clinic\PersonalRecord;
use App\Models\Student;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        //dd(Queue::where('status', 3)->paginate(25));
        // $timecountdownend = strtotime("2020-05-18 14:30:00");
        // $timecountdownstart = strtotime("now");
        // $startdatetime = "2020-05-18 14:07:00"; //variable for starting datetime

        // $timeleft = $timecountdownend - $timecountdownstart;

        // echo ($timeleft) . "<br>";
        // echo (PHP_EOL). "<br>";
        // echo ($timeleft * (-1)). "<br>";
        // echo (PHP_EOL). "<br>";
        // echo (date('Y-m-d h:i:sa', strtotime($startdatetime) + $timeleft * (-1))). "<br>";
        //dd(Queue::whereRaw('status = 0 ORDER BY id')->first());
        //         SELECT * FROM students
        // WHERE status = 0
        // ORDER BY id
        // LIMIT 1;
        //dd(Queue::whereRaw('status = 5 ORDER BY id')->first());

        return view('clinic.doctor.doctor', [
            'students' => Queue::where('status', 0)->paginate(25),
            'emergency' => Queue::where('status', 5)->paginate(25),
            'minidemer' => Queue::whereRaw('status = 5 ORDER BY id')->first(),
            'minid' =>  Queue::whereRaw('status = 0 ORDER BY id')->first()

        ]);
    }

    public function show(
        Student $student,
        MedicalRecord $histories
    ) {

        //change queue status of the student when doctor accepts
        $queueid = Queue::where('student_id', $student->id)->first();
        //dd($queue->id);
        //update queue status
        $queue = Queue::where('id', $queueid->id)->first();
        $queue->doctor_id = auth()->user()->id;
        $queue->status = 1;
        $queue->save();
        //dd($queue);


        //
        $histories = MedicalRecord::where('student_id', $student->id)->first();
        //dd($histories);

        $labhistories = LabResult::where('student_id', $student->id)->get();
        //dd($labhistories); // returns empty array
        //dd(count(Medication::where('medicalhistories_id', $histories->id)->get()))


        //check if the student id existes in medical history table
        if ($histories === null) {
            //ID does not exist it will create a new history table
            $medicalhistories = new MedicalRecord();
            $medicalhistories->student_id = $student->id;
            $medicalhistories->doctor_id  = auth()->user()->id;
            //save the history table
            $medicalhistories->save();

            //$medhistories = Medication::where('medicalhistories_id', $histories->id)->get();

        } else {
            //ID exists
            $medhistories = Medication::where('medical_record_id', $histories->id)->get();
            $personalmedhistories = PersonalRecord::where('medical_record_id', $histories->id)->get();
            // dd($medhistories);
        }
        //dd($histories);



        //dd($labhistoriess);

        // dd($historiess);
        //dd($medhistories);
        return view('clinic.doctor.student_info', [
            'student' => $student,
            'histories' => $histories,
            'labhistories' => $labhistories,
            'medhistories' => $medhistories,
            'personalmedhistories' => $personalmedhistories
        ]);
    }
    //get doctor id from loged in user(AUTH) the creat a lab report
    //with that doctor id for lab que and create lab que to be edited
    //with lab assistant id then redirect back to doc page with list of student
    //to be accepted
    public function storeLabRequests(Request $request, Student $student)
    {
        $a = 1;


        //create lab que with labreport id
        $labQueue = new LabQueue();
        $labQueue->student_id = $student->id;
        $labQueue->student_id = $student->id;
        $labQueue->save();
        //get all values from the check box except the token and save to lab queue
        if($labQueue->id){
           foreach ($request->except('_token') as $req) {
            foreach ($req as $labRequest) {
                //echo $a++ . $labRequest . "<hr>";
                $labRequests = new labRequest();
                $labRequests->title = $labRequest;
                $labRequests->description = $labRequest;
                $labRequests->student_id = $student->id;
                $labRequests->doctor_id = auth()->user()->id;
                // echo $labRequest . "<hr>";
                $labRequests->save();
            }
            return redirect('/clinic/doctor/detail/' . $student->id)->with('status', 'Lab sent!');
        } 
        }
        
        //dd($labReport->id);
        //Labreport::create($formField);

        if ($labRequests->id) {
            //create lab que with labreport id
            $labQueue = new LabQueue();
            $labQueue->lab_request_id = $labRequests->id;
            $labQueue->student_id = $student->id;
            $labQueue->student_id = $student->id;
            $labQueue->save();
            // dd($labQueue->id);

            //redirect to its own page
            return redirect('/clinic/doctor/detail/' . $student->id)->with('status', 'Lab sent!');
        }
    }
    //storeMedRecord
    public function storeMedRecord(Request $request, Student $student)
    {
        $formField = $request->validate([
            'name' => 'required',
            'amount'  => 'required',
            'frequency' => 'required',
            'why' => 'required',
            'how_much' => 'required'

        ]);
        $histories = MedicalRecord::where('student_id', $student->id)->first();
        // $formField['doctor_id '] = auth()->user()->id;
        // $formField['student_id '] = $student->id;
        // $formField['medical_record_id '] = $histories->id;
        // dd($formField);
        $medicalrecord = new Medication();

        $medicalrecord->name = $formField['name']; //name
        $medicalrecord->amount = $formField['amount']; //amount in grams
        $medicalrecord->frequency = $formField['frequency']; //daily how often
        $medicalrecord->why = $formField['why']; //why 
        $medicalrecord->how_much = $formField['how_much']; //how many pills
        $medicalrecord->medical_record_id = $histories->id;
        $medicalrecord->save();
        //dd($medicalrecord->id);
        // // or anther method


        //redirect to its own page
        return redirect('/clinic/doctor/detail/' . $student->id)->with('status', 'Medcin added!');
    }



    //storeMedRecord
    public function storePersonalRecord(Request $request, Student $student)
    {
        //dd($request);
        $formField = $request->validate([
            'disease_or_conditions' => 'required',
            'current' => 'required',
            'comments' => 'required'

        ]);
        //dd($request);
        $histories = MedicalRecord::where('student_id', $student->id)->first();
        // $formField['doctor_id '] = auth()->user()->id;
        // $formField['student_id '] = $student->id;
        // $formField['medical_record_id '] = $histories->id;
        // dd($formField);
        $personalmedicalrecord = new PersonalRecord();

        $personalmedicalrecord->disease_or_conditions = $formField['disease_or_conditions'];
        $personalmedicalrecord->current = $formField['current'];
        $personalmedicalrecord->comments = $formField['comments'];
        $personalmedicalrecord->medical_record_id = $histories->id;
        //dd($personalmedicalrecord);
        $personalmedicalrecord->save();
        ($personalmedicalrecord);
        // // or anther method


        //redirect to its own page
        return redirect('/doctor/detail/' . $student->id)->with('status', 'Medcin added!');
    }


    //delete que where student id is given
    public function delete(Student $student)
    {
        //find queue where student_id = $student->id
        $queue = Queue::where('student_id', $student->id)->first();
        //dd($queue);

        $queue->delete();

        return redirect('/doctor')->with('status', 'Queue deleted!');
    }
}
