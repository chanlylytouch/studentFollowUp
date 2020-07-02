@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <img src="{{ asset('img/'.$student->picture) }}" alt="{{$student->picture}}" width="80" style="border-radius: 40px;" height="80">
                </div>
                <div class="card-body">
                    <h3><strong>{{$student->firstname." ".$student->lastname}}</strong> - {{$student->class}}</h3>
                    <strong>Description:</strong> {{$student->description}}
                    <br>
                    @foreach ($tutors as $tutor)
                        @if ($student->user_id == $tutor->id)
                            Tutor: {{$tutor->firstname}}
                        @endif
                    @endforeach
                    <br><br>
                    <form action="{{route('addcomment',$student->id)}}" method="POST">
                        @csrf
                        <textarea name="comment" class="form-control " rows="3" placeholder="Add comment..."></textarea>
                        <button type="submit" class="btn btn-outline">
                            <span class="material-icons text-danger float-right">send</span>
                        </button>
                    </form>
                    @foreach ($student->comments as $comment)  
                    <div class="container">
                        <img src="https://cdn2.vectorstock.com/i/1000x1000/25/31/user-icon-businessman-profile-man-avatar-vector-10552531.jpg" width="40" style="border-radius: 40px;" height="40">
                        <strong>{{$comment->user['firstname'] }}</strong>  {{$comment->created_at }}
                        <br>
                        <br>
                    </div>
                    <div class="card-body bg-light">{{($comment->comment)}}     
                        <a href="{{route('edit',$comment->id)}}"  data-toggle="modal" data-target="#centralModalSm{{$comment->id}}"><span class="material-icons text-success float-right">edit</span></a>
                        <a href="{{route('delete',$comment->id)}}"><span class="material-icons text-danger float-right">delete</span></a>
                        @method('DELETE')
                        <!-- Central Modal Small -->
                        <div class="modal fade" id="centralModalSm{{$comment->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h2 class="modal-title w-100 text-center" id="myModalLabel">Edit Comment</h2>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                <form action="{{ route('edit',$comment->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="description">Comment</label>
                                        <textarea class="form-control" id="comment" name="comment" rows="4">{{$comment->comment}}</textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary float-right">Save</button>
                                </form>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>    <!-- Central Modal large -->
                    <br>  
                    @endforeach 
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>


@endsection