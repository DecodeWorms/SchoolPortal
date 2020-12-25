<?php

namespace App\Http\Middleware;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App;
use Closure;
use Cookie;

class CheckPoints
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        
        // $collegeId = Session::get('college_id');
        $collegeId = $request->session()->get('college_id');

        $collegeStudentResult = \App\CollegeStudentFolder\Result::where('student_id','=',$collegeId)->get();

        foreach($collegeStudentResult as $results){
            if($results->total == 516){
                return back();
            }else{
                return $next($request);
            }
        }

        
    }
}
