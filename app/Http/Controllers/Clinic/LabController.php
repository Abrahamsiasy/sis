<?php

namespace App\Http\Controllers\Clinic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Clinic\LabQueue;
use App\Models\Clinic\Queue;
use App\Models\Clinic\LabRequest;
use App\Models\Clinic\LabResult;

class LabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('lab.lab', [
            'labqueues' => LabQueue::where('status', "0")->paginate(25),
            // 'rooms' => Room::all(),
        ]);
    }



    public function show(
        Student $student,
    ) {
        //change queue status of the student when doctor accepts
        $queueid = LabQueue::where('student_id', $student->id)->first();
        //dd($queueid);
        //update queue status
        $labqueue = LabQueue::where('id', $queueid->id)->first();
        $labqueue->lab_assistant_id = auth()->user()->id;
        $labqueue->status = "1";
        $labqueue->save();
        //dd($labqueue->status);


        //get the lab report based on lab queue id
        $labRequest = LabRequest::where('id', $labqueue->lab_request_id)->first();
        //dd($labreport);

        return view('lab.result', [
            'student' => $student,
            'labReques' => $labRequest
        ]);
    }



    public function storeLabResultss(Request $request, Student $student)
    {
        //dd($student->id);
        $formField = $request->validate([
            'title' => 'required',
            'description'  => 'required',
            'comment'  => 'required'

        ]);
        // $formField['lab_assistant_id '] = auth()->user()->id;
        // $formField['student_id '] = $student->id;
        // dd($formField);
        // // or anther method

        $queueid = LabQueue::where('student_id', $student->id)->first();
        $labqueue = LabQueue::where('id', $queueid->id)->first();
        //dd($labqueue->labReques_id);



        $result = new LabResult();
        $result->title = $request->title;
        $result->description = $request->description;
        $result->comment = $request->comment;
        $result->student_id = $student->id;
        $result->lab_report_id = $labqueue->labReques_id;

        $result->lab_assistant_id = auth()->user()->id;
        $result->save();

        //get the labque id and delte * from lab queue so it disapears from the labque list
        $labque = LabQueue::find($labqueue);
        $labque->each->delete();
        //after the labque is delted the it needs to create main que back to the doctor get doector id from lab report and put it back

        //LabRequest::create($formField);


        //after deleting lab que send the student straigh to the doctor by adding it to que with status one
        //redirect to view lab

        //slect from queue where student_id = $student->id
        //$queue = Queue::where('student_id', $student->id)->first(); //cant be used since queue is deleted
        $labRequest = LabRequest::where('student_id', $student->id)->first();
        $queue = new Queue();
        $queue->student_id = $student->id;
        $queue->doctor_id = $labRequest->doctor_id;
        $queue->status = "1";
        $queue->save();
        return redirect('/clinic/lab')->with('status', 'Lab Result submited to the doctor');
    }
}
