<?php

namespace App\Providers;
use App\UserInterface\StudentInterface;
use App\TertiaryStudentImplement\TertiaryStudent;
use App\CollegeStudentImplement\CollegeStudent;

use Illuminate\Support\ServiceProvider;

class SchoolPortal extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->when('App\Http\Controllers\TertiaryStudentController')->needs('App\UserInterface\StudentInterface')
        ->give('App\TertiaryStudentImplement\TertiaryStudent');

        $this->app->when('App\Http\Controllers\CollegeStudentController')->needs('App\UserInterface\StudentInterface')
        ->give('App\CollegeStudentImplement\CollegeStudent');
        
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        
    }
}
