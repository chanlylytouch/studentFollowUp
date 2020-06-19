@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center text-primary"><strong>Student Follow Up</strong></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#home">Follow up student</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#menu1">Out Of Follow Up</a>
                        </li>
                    </ul>
                    <br>
                    @if (auth::id() == 1)
                    <!-- Tab panes -->
                      <div class="tab-content">
                        <div class="tab-pane container active" id="home"> 
                            <div class="container">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#centralModalSm">
                                  Add Student
                                </button>
                                <br><br>    
                                <table class="table table-hover">
                                <thead>
                                    <tr>
                                    <th>ID</th>
                                    <th>Profile</th>
                                    <th>Username</th>
                                    <th>Class</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                
                                @foreach ($students as $student)
                                
                                <tbody>
                                    <tr>
                                      <td>{{$student->id}}</td>
                                      <td><img src="{{ asset('img/'.$student->picture) }}" alt="{{$student->picture}}" style="width: 70px; height: 70px;"></td>
                                      <td>{{$student->firstname}}.{{$student->lastname}}</td>
                                      <td>{{$student->class}}</td>
                                      <td>{{$student->activeFollowUp}}
                                        <a href=""><span class="material-icons text-danger">person_add_disabled</span></a>  
                                        &nbsp;&nbsp;<a href="{{ route('editStudent',$student->id)}}"><span class="material-icons text-success">edit </span></a>
                                      </td>
                                    </tr>
                                </tbody>
                                @endforeach
                                </table>
                            </div>
                        </div>
                       
                          <div class="tab-pane container fade" id="menu1">
                            <div class="container">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Profile</th>
                                        <th>Username</th>
                                        <th>Class</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    
                                    @foreach ($students as $student)
                                    
                                    <tbody>
                                    <tr>
                                        <td>{{$student->id}}</td>
                                        <td><img src="{{ asset('img/'.$student->picture) }}" alt="{{$student->picture}}" style="width: 70px; height: 70px;"></td>
                                        <td>{{$student->firstname}}.{{$student->lastname}}</td>
                                        <td>{{$student->class}}</td>
                                        <td>{{$student->activeFollowUp}}
                                            <a href=""><span class="material-icons text-danger">how_to_reg </span></a>             
                                        </td>
                                    </tr>
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>  
                      </div>
                      @else
                      <div class="tab-content">
                        <div class="tab-pane container active" id="home"> 
                            <div class="container">
                                
                                <table class="table table-hover">
                                <thead>
                                    <tr>
                                    <th>ID</th>
                                    <th>Profile</th>
                                    <th>Username</th>
                                    <th>Class</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                
                                @foreach ($students as $student)
                                
                                <tbody>
                                    <tr>
                                      <td>{{$student->id}}</td>
                                      <td><img src="{{ asset('img/'.$student->picture) }}" alt="{{$student->picture}}" style="width: 70px; height: 70px;"></td>
                                      <td>{{$student->firstname}}.{{$student->lastname}}</td>
                                      <td>{{$student->class}}</td>
                                      <td>{{$student->activeFollowUp}}
                                        {{-- <a href=""><span class="material-icons text-danger">person_add_disabled</span></a>   --}}
                                        <a href=""><span class="material-icons text-success">how_to_reg </span></a>
                                      </td>
                                    </tr>
                                </tbody>
                                @endforeach
                                </table>
                            </div>
                        </div>
                       
                          <div class="tab-pane container fade" id="menu1">
                            <div class="container">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Profile</th>
                                        <th>Username</th>
                                        <th>Class</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    
                                    @foreach ($students as $student)
                                    
                                    <tbody>
                                    <tr>
                                        <td>{{$student->id}}</td>
                                        <td><img src="{{ asset('img/'.$student->picture) }}" alt="{{$student->picture}}" style="width: 70px; height: 70px;"></td>
                                        <td>{{$student->firstname}}.{{$student->lastname}}</td>
                                        <td>{{$student->class}}</td>
                                        <td>{{$student->activeFollowUp}}
                                            <a href=""><span class="material-icons text-danger">how_to_reg </span></a>             
                                        </td>
                                    </tr>
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>  
                      </div>
                      @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Central Modal Small -->
<div class="modal fade" id="centralModalSm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title w-100" id="myModalLabel">Add Student to follow up</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" enctype="multipart/form-data" action="{{ route('addStudent')}}">
          @csrf
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="firstname">Firstname</label>
              <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Firstname">
            </div>
            <div class="form-group col-md-6">
              <label for="lastname">Lastname</label>
              <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Lastname">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="picture">Profile</label>
              <input type="file" class="form-control" name="picture" id="picture">
            </div>
            <div class="form-group col-md-4">
              <label for="class">Class</label>
              <select id="class" class="form-control" name="class">
                <option selected>Choose...</option>
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
              <select id="class" class="form-control" name="class">
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
              <textarea class="form-control" id="description" name="description" rows="4"></textarea>
          </div>
          <button type="submit" class="btn btn-primary float-right">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Central Modal large -->
@endsection
