@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-2"></div>  
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h2 class="text-center">Edit Student</h2>
        </div>
        <div class="card-body">
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
              <div class="form-group col-md-4">
                <label for="picture">Picture</label>
                <input type="file" class="form-control" name="picture" value="{{$students->picture}}" id="picture">
              </div>
              <div class="form-group col-md-4">
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
              <div class="form-group col-md-4">
                <label for="tutor">Tutor</label>
                <select id="tutor" class="form-control" name="tutor">
                  <option selected>Choose...</option>
                  <option>Normal</option>
                  <option>English Trainer</option>
                  <option>WEP Trainer</option>
                  <option>SNA Trainer</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <textarea class="form-control" id="description" name="description" rows="3">{{$students->description}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary float-right">Save</button>
            <a href="{{ route('back') }}" class="btn btn-danger float-left">Cancel</a>
          </form>
        </div>
      </div>
    </div> 
    <div class="col-md-2"></div>  
  </div>
</div>
@endsection