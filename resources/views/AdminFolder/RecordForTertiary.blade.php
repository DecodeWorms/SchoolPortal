@extends('StudentAppBase');
@section('header')
<nav class = "nav">Tertiary Result Input</nav>
@stop()
@section('body')
<form action = "{{url('/saveTertiaryResults')}}" method = "post">
{{csrf_field()}}
<label for = "tertiaryId" class = "form-label">Tertiary Id</label>
<input type = "number" class = "form-control" name = "id" placeholder = "Tertiary Id"><br><br>
<label for = "operatingSystem1" class = "form-label">Operating System1</label>
<input type = "number" class = "form-control" name = "os1" placeholder = "Operating System1"><br><br>
<label for = "operatingSystem2" class = "for-label">Operating  System2</label>
<input type = "number" class = "form-control" name = "os2" placeholder = "Operating System2"><br><br>
<label for = "computerArchitecture" class = "form-label">Computer Architecture</label>
<input type = "number" class = "form-control" name = "ca" placeholder = "Computer Architecture"><br><br>
<label for = "mathematicalMethod" class = "form-label">mathematical Method</label>
<input type = "number" class = "form-control" name = "mm" placeholder = "Mathematical Method"><br><br>
<button type="submit" class="btn btn-primary">SUBMIT</button>
</form>
@stop()