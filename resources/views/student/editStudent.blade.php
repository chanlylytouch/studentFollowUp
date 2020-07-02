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
          <form method="POST" action="{{ route('updateStudent',$students->id) }}" enctype="multipart/form-data">
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
                  {{-- <option selected>{{$students->class}}</option> --}}
                  <option  {{old('class',$students->class)=="2021A"? 'selected':''}}>2021A</option>
                  <option  {{old('class',$students->class)=="2021B"? 'selected':''}}>2021B</option>
                  <option  {{old('class',$students->class)=="2021C"? 'selected':''}}>2021C</option>
                  <option  {{old('class',$students->class)=="2020WEP-A"? 'selected':''}}>2020WEP-A</option>
                  <option  {{old('class',$students->class)=="2020WEP-B"? 'selected':''}}>2020WEP-B</option>
                  <option  {{old('class',$students->class)=="2020SNA"? 'selected':''}}>2020SNA</option>
                </select>
              </div>
              <div class="form-group col-md-4">
                <label for="tutor">Tutor</label>
                <select id="tutor" class="form-control" name="tutor">
                  @foreach ($tutors as $tutor)
                    <option value="{{$tutor->id}}">{{$tutor->firstname}}</option>
                  @endforeach
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