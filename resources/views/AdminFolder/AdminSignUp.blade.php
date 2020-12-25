@extends('StudentAppBase')
@section('header')
<nav class = "nav bg-primary">Sign Up</nav>
@stop()
@section('body')
<form action = "{{url('/saveAdminInfo')}}" method = "post">
{{csrf_field()}}
<label for = "username" class = "form-label">User Name</labe>
<input type = "text" class = "form-control" name = "userName" placeholder = "User Name"><br><br>
<label for = "password" class = "form-label">Password</label>
<input type = "password" class = "form-control" name = "password" placeholder = "*****"><br><br>
<label for = "gender" class = "form-label">Gender</a>
<select class="form-control" name="gender">
              <option>Male</option>
              <option>Female</option>
              </select><br><br>
<button type="submit" class="btn btn-primary">SUBMIT</button>
</form>
@stop()