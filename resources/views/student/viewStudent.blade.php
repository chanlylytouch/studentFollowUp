@extends('layouts.app')

@section('content')
<div class="container">
    <br><br>    
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Picture</th>
          <th>Username</th>
          <th>Class</th>
          <th>Tutor</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><img src="{{ asset('img/'.$students->picture) }}" alt="{{$students->picture}}" style="width: 70px; height: 70px;"></td>
          <td>{{$students->firstname}}.{{$students->lastname}}</td>
          <td>{{$students->class}}</td>
          <td>{{$students->tutor}}</td>
        </tr>
      </tbody>
    </table>
  </div>     
  @endsection