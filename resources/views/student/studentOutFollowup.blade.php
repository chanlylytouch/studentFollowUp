@extends('layouts.app')

@section('content')
<div class="container">
    <br><br>    
    <table class="table table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Picture</th>
          <th>Username</th>
          <th>Class</th>
          <th>activeFollowUp</th>
        </tr>
      </thead>
      
      @foreach ($students as $student)
      
      <tbody>
        <tr>
          <td>{{$student->id}}</td>
          <td>{{$student->picture}}</td>
          <td>{{$student->firstname}}.{{$student->lastname}}</td>
          <td>{{$student->class}}</td>
          <td>{{$student->activeFollowUp}}
            <a href=""><span class="material-icons text-danger">person_add_disabled</span></a>  
            <a href=""><span class="material-icons text-success">how_to_reg </span></a>
          </td>
        </tr>
      </tbody>
      @endforeach
    </table>
  </div>
  @endsection