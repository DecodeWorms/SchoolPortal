@extends('StudentAppBase')
@section('header')
<nav class = "nav bg-primary">Check Student Info</nav>
@stop()
@section('body')
<form action = "{{url('/fullStudentInfo')}}" method = "get">
{{csrf_field()}}

<label for = "username" class = "form-label">User Unique Id</labe>
<input type = "number" class = "form-control" name = "studentId" placeholder = "User Id"><br><br>
<label for = "gender" class = "form-label">Gender</a>
<select class="form-control" name="studentType" >
              <option>College</option>
              <option>Tertiary</option>
              </select><br><br>
<button type="submit" class="btn btn-primary">SUBMIT</button>
</form>
@stop()