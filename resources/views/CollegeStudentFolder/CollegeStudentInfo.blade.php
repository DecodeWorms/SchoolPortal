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
               <label for = "class" class = "form-label"><b><i>Class :{{$row['class']}}</b></i></label><br><br>
               <label for = "gender" class = "form-label"><b><i>Gender :{{$row['gender']}}</b></i></label><br><br>
@endforeach()
           </div>
       </div>

       <hr>
       
<table class = "table">
<thead>
<tr>
<th scope = "col">Mathematics</th>
<th scope = "col">Physics</th>
<th scope = "col">Chemistry</th>
<th scope = "col">Biology</th>
<th scope = "col">Technical Drawing</th>
<th scope = "col">English Language</th>
<th scope = "col">Total</th>
<th scope = "col">Status</th>
</tr>
</thead>
<tbody>


<tr>
@foreach($row->results as $rows)
<th scope = "row">{{$rows['mathematics']}}</th>
<td>{{$rows['physics']}}</td>
<td>{{$rows['chemistry']}}</td>
<td>{{$rows['biology']}}</td>
<td>{{$rows['technical_drawing']}}</td>
<td>{{$rows['english_language']}}</td>
<td>{{$rows['total']}}</td>
<td>{{$rows['status']}}</td>
</tr>
@endforeach()
</tbody>
</table>

@stop()