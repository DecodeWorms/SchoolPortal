<?php
namespace App\CollegeStudentImplement;
use App\Http\Requests\StoreRequest;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\UserInterface\StudentInterface;
//use App\CollgeStudentFolder;
use App;
use Validator;
use Session;


Class CollegeStudent implements StudentInterface{

    protected $request;

    public function __construct(Request $request){
        $this->request = $request;
        
    }

    public function signUp(){
        $signUp = new App\CollegeStudentFolder\Student;

        $validated = $this->request->validate([
            'firstName'=>'alpha',
            'lastName'=>'alpha',
            'gender'=>'alpha',
            'email'=>['email','unique:students,email'],
            'password'=>'alpha_num|min:6',           
            'class'=>'alpha_num',
            'parent_phone_number'=>'numeric',
            'image'=>'image'

        ]);
        // $validated = $validator->validated();

        

        if($validated){
            $signUp->first_name = $this->request->firstName;
            $signUp->last_name = $this->request->lastName;
            $signUp->gender = $this->request->gender;
            $signUp->email = $this->request->email;
            $signUp->password = sha1($this->request->password);
            $signUp->class = $this->request->class;
            $signUp->parent_phone_number = $this->request->parentPhoneNumber;
            $name =  $this->request->file('image')->getClientOriginalName();
            $signUp->image = $this->request->file('image')->move('public\Pictures',$name);
            $signUp->save();
            return "Datas are now saved";

        }
        else{
            return $this->request->back();

        }
    }

    public function signIn(){
        $userEmail = $this->request->email;
        $userPassword = sha1($this->request->password);
        $result = \App\CollegeStudentFolder\Student::where('email','=',$userEmail)
        ->where('password','=',$userPassword)->get();

		foreach($result as $infos){
			if($infos->email == $userEmail && $infos->password == $userPassword){
				$userId = $infos->id;
               
                $this->request->session()->put('college_id',$userId);
				return redirect('/collegeMyProfile');
			}
			elseif($infos->email != $userEmail || $infos->password != $userPassword){
				return "Incorrect Email or Password";
            }
		}


    }

    public function checkProfile(){
        
        $userId = $this->request->session()->get('college_id');
        $userInfo = \App\CollegeStudentFolder\Student::with('results')->where('id','=',$userId)->get();
        return view('CollegeStudentFolder\CollegeStudentInfo',compact('userInfo'));
        
}


    public function signOut(){
        //$userId = $this->request->session()->get('college_id');
        if($this->request->session()->has('college_id')){
            $this->request->session()->forget('college_id');
            return "you have successfully sign out..";
        }
        else{
            return "You are already sign out";

        }

    }

    
}

?>