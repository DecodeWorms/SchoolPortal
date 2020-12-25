<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserInterface\StudentInterface;

class TertiaryStudentController extends Controller
{
    protected $interface;

    public function __construct(StudentInterface $interface){

        $this->interface = $interface;
    }

    public function signUp(){
        return $this->interface->signUp();
    }

    public function signIn(){
        return $this->interface->signIn();
    }

    public function checkProfile(){
        return $this->interface->checkProfile();

    }

    public function signOut(){
        return $this->interface->signOut();
    }

}
