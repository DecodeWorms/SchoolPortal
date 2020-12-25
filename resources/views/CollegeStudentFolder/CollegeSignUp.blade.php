@extends('StudentAppBase')
@section('header')
<nav class = "nav">Sign Up</nav>
@stop()
@section('body')
<form action = "{{url('/saveCollegeInfo')}}" method = "post" enctype = "multipart/form-data">
 {{csrf_field()}}
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="firsName">First Name</label>
      <small class = "text-danger">{{$errors->first('firstName')}}</small>
      <input type="text" class="form-control" name="firstName" placeholder="First Name">
    </div>
    <div class="form-group col-md-6">
      <label for="lastName">Last Name</label>
      <small class = "text-danger">{{$errors->first('lastName')}}</small>
      <input type="text" class="form-control" name="lastName" placeholder="Last Name">
    </div>
  </div>
  
  <div class="form-row">
   <div class = "form-group col-md-6">
    <label for="gender">Gender</label>
    <small class = "text-danger">{{$errors->first('gender')}}</small>
    <select class="form-control" name="gender">
              <option>Male</option>
              <option>Female</option>
              </select><br>
  </div>
  <div class="form-group col-md-6">
    <label for="email">Email</label>
    <small class = "text-danger">{{$errors->first('email')}}</small>
    <input type="email" class="form-control" name="email" placeholder="Email">
  </div>
  </div>

  <div class="form-row">
   <div class="form-group col-md-4">
      <label for="password">Password</label>
      <small class = "text-danger">{{$errors->first('password')}}</small>
      <input type = "password" class = "form-control" name = "password" placeholder = "******">
    </div>
    <div class="form-group col-md-4">
      <label for="class">Class</label>
      <small class = "text-danger">{{$errors->first('class')}}</small>
      <input type = "text" class = "form-control" name = "class" placeholder = "Class">
    </div>
    <div class = "form-group col-md-4">
      <label for="parentPhoneNumber">Parent Phone Number</label>
      <small class = "text-danger">{{$errors->first('parentPhoneNumber')}}</small>
      <input type="text" class="form-control" name="parentPhoneNumber" placeholder = "ParentPhoneNumber">
    </div>
    </div>

  <div class = "">
      <label for = "image">Image</label>
      <small class = "text-danger">{{$errors->first('image')}}</small>
      <input type = "file" class = "form-control-file alert alert-secondary" name = "image" placeholder = "">
  </div>
  <button type="submit" class="btn btn-primary">SUBMIT</button>
</form>
@stop()