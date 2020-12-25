<?php

namespace App\TertiaryStudentFolder;

use Illuminate\Database\Eloquent\Model;

class TertiaryStudent extends Model
{
    public $table =  'tertiary_students';

    public function tertiaryStudentResults(){
        return $this->hasMany('App\TertiaryStudentFolder\TertiaryStudentResult');
    }
}
