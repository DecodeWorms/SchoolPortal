@extends('StudentAppBase')
@section('header')
<nav class = "nav bg-primary">Sign In</nav>
@stop()
@section('body')
<form action = "{{url('/signInCollegStudent')}}" method = "post">
{{csrf_field()}}
<label for = "email" class = "form-label">Email</labe>
<input type = "email" class = "form-control" name = "email" placeholder = "Email"><br><br>
<label for = "password" class = "form-label">password</label>
<input type = "password" class = "form-control" name = "password" placeholder = "*****"><br><br>
<button type="submit" class="btn btn-primary">SUBMIT</button>
</form>
@stop()