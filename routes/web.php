<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::view('/tertiarySignUp','TertiaryStudentFolder/TertiarySignUp');
Route::view('/tertiarySignIn','TertiaryStudentFolder/TertiarySignIn');
Route::post('/saveTertiaryInfo','TertiaryStudentController@signUp');
Route::post('/signInTertiarystudent','TertiaryStudentController@signIn');
Route::get('/tertiaryMyProfile','TertiaryStudentController@checkProfile');
Route::get('/tertiarySignOut','TertiaryStudentController@signOut');


Route::view('/collegeSignUp','CollegeStudentFolder/CollegeSignUp');
Route::view('/collegeSignIn','CollegeStudentFolder/CollegeSignIn');
Route::post('/saveCollegeInfo','CollegeStudentController@signUp');
Route::post('/signInCollegStudent','CollegeStudentController@signIn');
// Route::get('/collegeMyProfile','CollegeStudentController@checkProfile')->middleware('pointsVerification');
Route::get('/collegeMyProfile','CollegeStudentController@checkProfile');
Route::get('/collegeSignOut','CollegeStudentController@signOut');

Route::view('/adminSignUp','AdminFolder/adminSignUp');
Route::view('/adminSignIn','AdminFolder/adminSignIn');
Route::view('/adminSaveTertiaryResults','AdminFolder/RecordForTertiary');
Route::view('/adminSaveCollegeResults','AdminFolder/RecordForCollege');
Route::view('/checkStudentInfo','AdminFolder/CheckStudentProfile');
Route::get('/fullStudentInfo','AdminController@checkTertiaryProfile');
Route::post('/saveCollegeResults','AdminController@recordForCollege');
Route::post('/saveTertiaryResults','AdminController@recordForTertiary');
Route::post('/saveAdminInfo','AdminController@signUp');
Route::post('/signInAdmin','AdminController@signIn');
Route::get('/adminSignOut','AdminController@signOut');

Route::get('/checkId','AdminController@checkAdminId');

Route::get('/signout','CollegeStudentController@signout');