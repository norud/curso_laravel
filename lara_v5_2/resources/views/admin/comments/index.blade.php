@extends('layouts.admin')

@section('content')

    <h1>All Comments</h1>
    <div class="col-sm-6">
        @if ($comments)
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Author</th>
                <th scope="col">Email</th>
                <th scope="col">Body</th>
                <th scope="col">Post</th>
                <th scope="col">Replies</th>
                <th scope="col">Acctions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($comments as $comment)
              <tr>
                <th scope="row">{{$comment->id}}</th>
                <td>{{$comment->author}}</td>
                <td>{{$comment->email}}</td>
                <td>{{$comment->body}}</td>
              <td><a href="{{route('home.post', $comment->post->slug)}}">View Post</a></td>
              <td><a href="{{route('admin.comments.replies.show', $comment->id)}}">View Replies</a></td>
              <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                  @if ($comment->is_active == 1)
                  {!! Form::open(['method' => 'PATCH', 'action' => ['PostCommentController@update', $comment->id]]) !!}
                  {!! Form::hidden('is_active', 0, ['']) !!}
                  {!! Form::submit('Un-approve', ['class' => 'btn btn-warning']) !!}
                  {!! Form::close() !!}
                  @else
                  {!! Form::open(['method' => 'PATCH', 'action' => ['PostCommentController@update', $comment->id]]) !!}
                  {!! Form::hidden('is_active', 1, ['']) !!}
                  {!! Form::submit('Approve', ['class' => 'btn btn-success']) !!}
                  {!! Form::close() !!}
                  @endif
                {!! Form::open(['method' => 'Delete', 'action' => ['PostCommentController@destroy', $comment->id]]) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            </div>
              </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          @endif
    </div>
@endsection
