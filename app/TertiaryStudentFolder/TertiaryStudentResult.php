<?php

namespace App\TertiaryStudentFolder;

use Illuminate\Database\Eloquent\Model;
use App\TertiaryStudentFolder\TertiaryStudent;

class TertiaryStudentResult extends Model
{
    public $table = "tertiary_student_results";

    public function tertiaryStudents(){
        return $this->belongsTo('App\TertiaryStudentFolder\TertiaryStudent');
    }
}
