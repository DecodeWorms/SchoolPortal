@extends('StudentAppBase')
@section('header')
<nav class = "nav">Student Full Info</nav>
@stop()
@section('body')
@foreach($userInfo as $row)
<div class = "card">
           <div class = "card-body">
           <img src="{{$row['image']}}" style="width: 100px; height:100px;" class="img-circle"><br><br>
               <label for = "firstName" class = "form-label"><b><i>First Name : {{$row['first_name']}}</b></i></label><br><br>
               <label for = "lastName" class = "form-label"><b><i>Last Name : {{$row['last_name']}}</b></i></label><br><br>
               <label for = "department" class = "form-label"><b><i>Department :{{$row['department']}}</b></i></label><br><br>
               <label for = "gender" class = "form-label"><b><i>Gender :{{$row['gender']}}</b></i></label><br><br>


           </div>
       </div>
 @endforeach()
       <hr>

<table class = "table">
<thead>
<tr>
<th scope = "col">Operating System1</th>
<th scope = "col">Operating System2</th>
<th scope = "col">Computer Architecture</th>
<th scope = "col">Mathematical Method</th>
<th scope = "col">Total</th>
<th scope = "col">Status</th>
</tr>
</thead>
<tbody>


<tr>
@foreach($row->tertiaryStudentResults as $rows)
<th scope = "row">{{$rows['operating_system1']}}</th>
<td>{{$rows['operating_system2']}}</td>
<td>{{$rows['computer_architecture']}}</td>
<td>{{$rows['mathematical_method']}}</td>
<td>{{$rows['total']}}</td>
<td>{{$rows['status']}}</td>
</tr>
@endforeach()
</tbody>
</table>

@stop()