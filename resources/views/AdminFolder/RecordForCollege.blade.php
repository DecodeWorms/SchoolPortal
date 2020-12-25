@extends('StudentAppBase');
@section('header')
<nav class = "nav">College Result Input</nav>
@stop()
@section('body')
<form action = "{{url('/saveCollegeResults')}}" method = "post">
{{csrf_field()}}
<label for = "collegeId" class = "form-label">College Id</label>
<input type = "number" class = "form-control" name = "id" placeholder = "College Id"><br><br>
<label for = "mathematics" class = "form-label">Mathematics</label>
<input type = "number" class = "form-control" name = "math" placeholder = "Mathematics"><br><br>
<label for = "physics" class = "for-label">Physics</label>
<input type = "number" class = "form-control" name = "physic" placeholder = "Physics"><br><br>
<label for = "chemistry" class = "form-label">Chemistry</label>
<input type = "number" class = "form-control" name = "chemistry" placeholder = "Chemistry"><br><br>
<label for = "biology" class = "form-label">Biology</label>
<input type = "number" class = "form-control" name = "biology" placeholder = "Biology"><br><br>
<label for = "technicalDrawing" class = "form-label">Technical Drawing</label>
<input type = "number" class = "form-control" name = "td" placeholder = "Technical Drawing"><br><br>
<label for = "englishLanguage" class = "form-label">English Language</label>
<input type = "number" class = "form-control" name = "eng" placeholder = "English Language"><br><br> 
<button type="submit" class="btn btn-primary">SUBMIT</button>
</form>
@stop()