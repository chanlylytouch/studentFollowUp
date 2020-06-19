@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-2"></div>  
    <div class="col-md-8"> 
      <form method="POST" action="{{ route('edit',$students->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="firstname">Firstname</label>
          <input type="text" class="form-control" name="firstname" value="{{$students->firstname}}" id="firstname" placeholder="Firstname">
          </div>
          <div class="form-group col-md-6">
            <label for="lastname">Lastname</label>
            <input type="text" class="form-control" name="lastname" value="{{$students->lastname}}" id="lastname" placeholder="Lastname">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="picture">Picture</label>
            <input type="file" class="form-control" name="picture" value="{{$students->picture}}" id="picture">
          </div>
          <div class="form-group col-md-6">
            <label for="class">Class</label>
            <select id="class" class="form-control" name="class" >
              <option selected>{{$students->class}}</option>
              <option>2021A</option>
              <option>2021B</option>
              <option>2021C</option>
              <option>2020WEP-A</option>
              <option>2020WEP-B</option>
              <option>2020SNA</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <textarea class="form-control" id="description" value="{{$students->description}}" name="description" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary float-right">Edit Student</button>
      </form>
    </div> 
    <div class="col-md-2"></div>  
  </div>
</div>
@endsection