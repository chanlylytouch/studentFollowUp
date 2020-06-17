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
        <td>{{$student->activeFollowUp}}</td>
        {{-- <td><i class="icons icons-delete"></i></td> --}}
      </tr>
    </tbody>
    @endforeach
  </table>