<?php

namespace App\CollegeStudentFolder;
use App\CollegeStudentFolder\Student;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    public $table = "results";

    public function students(){
        return $this->belongsTo(Student::class);
    }
}
