<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Clinic\MedicalRecord;
use App\Models\Clinic\Campus;


class Student extends Model
{
    use HasFactory;
    
    //one student has one medical history
    public function medicalRecords()
    {
        return $this->hasMany(medicalRecord::class);
    }

    //Student belongs to campas
    public function cumpus(){
        return $this->belongsTo(Campus::class);
    }

    public function scopeFilter($query, array $filters) {
        if ($filters['camp'] ?? false ) {
            $query->where('campus_id', 'like', '%' . request('camp') . '%');
        }

    }
}
