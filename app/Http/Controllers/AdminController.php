<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Authenticable;
use App\AdminFolder;
use App\TertiaryStudentFolder\TertiaryResult;
use App\CollegeStudentFolder\CollegeResult;
use Validator;
use Session;
use App;

class AdminController extends Controller
{
    protected $request;

    public function __construct(Request $request){
        $this->request = $request;
    }

    public function signUp(){
        $signUp = new App\AdminFolder\Admin;
        $validated = $this->request-validate([
            'userName'=>'alpha',
            'password'=>'alpha_num|min:6',
            'gender'=>'alpha'

        ]);

        if($validated){
            $signUp->user_name = $this->request->userName;
            $signUp->password = sha1($this->request->password);
            $signUp->gender = $this->request->gender;
            $signUp->save();
            return "You have successfully registered..";
        }
        else{
            return "Seems there is one or more problems";

        }

    }

    public function signIn(){
        $userName = $this->request->userName;
        $userPassword = sha1($this->request->password);

        $adminInfo = \App\AdminFolder\Admin::where('user_name','=',$userName)
        ->where('password','=',$userPassword)->get();

        foreach ($adminInfo as $adminValues){
            $adminId = $adminValues->id;
            $this->request->session()->put('admin_id',$adminId);
            return "You have successfully sign In";
        }
    }

    public function signOut(){
        $adminId = $this->request->session()->get('admin_id');
        if($adminId){
            $this->request->session()->forget('admin_id');
            return "You have successfully sign out";
        }
        else{
            return "Sorry i can not log you out..";


        }
    }

    public function recordForTertiary(){
        $tertiary = new App\TertiaryStudentFolder\TertiaryStudentResult;
        $tertiary->tertiary_student_id = $this->request->id;
        $tertiary->operating_system1 = $this->request->os1;
        $tertiary->operating_system2 = $this->request->os2;
        $tertiary->computer_architecture = $this->request->ca;
        $tertiary->mathematical_method = $this->request->mm;
        $sum = $this->request->os1 + $this->request->os2+ $this->request->ca + $this->request->mm;
        $tertiary->total = $sum/4;

        if($tertiary->total == 40 || $tertiary->total <= 49){
            $tertiary->status = "failed,repeat";
        }
        elseif ($tertiary->total ==  50 || $tertiary->total <=60) {
            $tertiary->status = "passed,promote";
        }
        elseif ($tertiary->total == 61 || $tertiary->total <=70) {
            $tertiary->status = "good,promote";
        }
        elseif ($tertiary->total == 71 || $tertiary->total <= 80) {
            $tertiary->status = "very good,promote";
        }
        elseif($tertiary->total == 81 || $tertiary->total <= 90){
            $tertiary->status = "A+,promote";
        }
        elseif ($tertiary->total == 91 || $tertiary->total <= 100) {
            $tertiary->status = "Excellent,promot";
        }
        else{
            $tertiary->status = "No result";

        }
        $tertiary->save();
        return "You have successfully saved student datas";
    }

    public function recordForCollege(){
        $college = new App\CollegeStudentFolder\Result;
        $college->student_id = $this->request->id;
        $college->mathematics = $this->request->math;
        $college->physics = $this->request->physic;
        $college->chemistry = $this->request->chemistry;
        $college->biology = $this->request->biology;
        $college->technical_drawing = $this->request->td;
        $college->english_language = $this->request->eng;
        $college->total = $this->request->math + $this->request->physic
         + $this->request->chemistry + $this->request->biology
        + $this->request->td + $this->request->eng;

        $sum = $college->total/6;

        if($sum == 40 || $sum <= 49){
            $college->status = "failed,repeat";
        }
        elseif ($sum == 50 || $sum <= 60) {
            $college->status = "passed,promote";
        }
        elseif ($sum == 61 || $sum <= 70) {
            $college->status = "good,promote";
        }
        elseif ($sum == 71 || $sum <= 80) {
            $college->status = "very,good promote";
        }
        elseif ($sum == 81 || $sum <= 90) {
            $college->status = "A+,promote";
        }
        elseif ($sum == 91 || $sum <= 100) {
            $college->status = "Excellent,promote";
        }
        else{
            $college->status = "No result";
        }
        $college->save();
        return "CollegeResults are saved";

    }

    public function checkTertiaryProfile(){
        $studentType = $this->request->studentType;
        $studentId = $this->request->studentId;

        if($studentType == "College"){
            $userInfo = \App\CollegeStudentFolder\Student::with('results')->where('id','=',$studentId)->get();
            return view('CollegeStudentFolder\CollegeStudentInfo',compact('userInfo'));

        }
        elseif($studentType == "Tertiary"){

            $userInfo = \App\TertiaryStudentFolder\TertiaryStudent::with('tertiaryStudentResults')->
            where('id','=',$studentId)->get();
            return view('TertiaryStudentFolder\TertiaryStudentInfo',compact('userInfo'));

        }
        else{
            return "Either Type or student id is not recognized";
        }

        
    }

    // public function checkAdminId(){

    //     $result = \App\AdminFolder\Admin::first()->getAuthIdentifierName();
    //     echo $result;
        
    // }


}
