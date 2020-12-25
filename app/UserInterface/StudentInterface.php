<?php
namespace App\UserInterface;

interface StudentInterface{

    public function signUp();
    public function signIn();
    public function checkProfile();
    public function signOut();
}

?>