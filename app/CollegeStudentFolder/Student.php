<?php

namespace App\CollegeStudentFolder;
use App\CollegeStudentFolder\Result;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $table = "students";

    public function results(){
        return $this->hasMany(Result::class);
    }
}
