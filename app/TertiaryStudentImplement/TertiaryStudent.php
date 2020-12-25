<?php

namespace App\TertiaryStudentImplement;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\UserInterface\StudentInterface;
use App\TertiaryStudentFolder;
use App;
use Validator;
use Session;

Class TertiaryStudent implements StudentInterface{

    protected $request;

    public function __construct(Request $request){
        $this->request = $request;

    }

    public function signUp(){

        $validated = $this->request->validate([
            'firstName'=>'alpha',
            'lastName'=>'alpha',
            'gender'=>'alpha',
            'email'=>['email','unique:tertiarys,email'],
            'password'=>'alpha_num|min:6',           
            'phoneNumber'=>'numeric',
            'department'=>'alpha',
            'image'=>'image'
        ]);

        

        if($validated){
            $signUp = new App\TertiaryStudentFolder\TertiaryStudent;
            $signUp->first_name = $this->request->firstName;
            $signUp->last_name = $this->request->lastName;
            $signUp->gender = $this->request->gender;
            $signUp->email = $this->request->email;
            $signUp->password = sha1($this->request->password);
            $signUp->phone_number = $this->request->phoneNumber;
            $signUp->department = $this->request->department;
            $name =  $this->request->file('image')->getClientOriginalName();
            $signUp->image = $this->request->file('image')->move('public\Pictures',$name);
            $signUp->save();

            return "Daras ara now saved..";
        }

        
        
    }

    public function signIn(){
        $userEmail = $this->request->email;
        $userPassword = sha1($this->request->password);

        $result = \App\TertiaryStudentFolder\TertiaryStudent::where('email','=',$userEmail)
        ->where('password','=',$userPassword)->get();

		foreach($result as $infos){

			if($infos->email == $userEmail && $infos->password == $userPassword){
				$userId = $infos->id;
                Session(['tertiary_id'=>$userId]);
                
				return redirect('/tertiaryMyProfile');
            }
            
			else{
				return "Sorry Incorrect password or email supplied";
			}

		}

		}

		public function checkProfile(){
			$userId = $this->request->session()->get('tertiary_id');
            $userInfo = \App\TertiaryStudentFolder\TertiaryStudent::with('tertiaryStudentResults')->
            where('id','=',$userId)->get();
            // $userInfo = \App\TertiaryStudentFolder\TertiaryStudent::where('id','=',$userId)->get();
            // $resultInfo = \App\TertiaryStudentFolder\TertiaryStudentResult::where('tertiary_student_id','=',$userId)->get();

            // $userInfoResult = $userInfo->toArray();
            // $userResults = $resultInfo->toArray();
            
            return view('TertiaryStudentFolder\TertiaryStudentInfo',compact('userInfo'));

		}

		public function signOut(){
			$userId = $this->request()->session->get('tertiary_id');
			if($userId){
                Session::forget('tertiary_id');
                return "You are successfully loged out";
			}
			else{
                return "Am sorry i can not log you out..";

			}

		}

							
}
?>

