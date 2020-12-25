@extends('StudentAppBase')
@section('header')
<nav class = "nav bg-primary">Sign In</nav>
@stop()
@section('body')
<form action = "{{url('/signInAdmin')}}" method = "post">
{{csrf_field()}}
<label for = "userName" class = "form-label">UserName</labe>
<input type = "text" class = "form-control" name = "userName" placeholder = "User Name"><br><br>
<label for = "password" class = "form-label">password</label>
<input type = "password" class = "form-control" name = "password" placeholder = "*****"><br><br>
<button type="submit" class="btn btn-primary">SUBMIT</button>
</form>
@stop()