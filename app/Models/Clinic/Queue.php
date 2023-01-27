<?php

namespace App\Models\Clinic;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Student;

class Queue extends Model
{
    use HasFactory;
    //queue has one student and one room
    //que has one student and one room
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function doctor()
    {
        return $this->belongsTo(User::class);
    }

}
