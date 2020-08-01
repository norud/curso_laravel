@extends('layouts.blog-post')

@section('content')
<h1>Post</h1>

@if (Session::has('comment'))
{{session('comment')}}
@endif
<!-- Title -->
<h1>{{$post->title}}</h1>

<!-- Author -->
<p class="lead">
    by
    <a href="#">{{$post->user->name}}</a>
</p>

<hr>

<!-- Date/Time -->
<p>Posted on {{$post->created_at->diffForHumans()}}</p>

<hr>

<!-- Preview Image -->
<img class="img-fluid rounded" src="{{$post->photo ? asset($post->photo->file) : 'http://placehold.it/400x400'}}" alt="">

<hr>
@if(Auth::check())
<!-- Comments Form -->
<div class="card my-4">
    <h5 class="card-header">Leave a Comment:</h5>
    <div class="card-body">

        {!! Form::open(['method'=>'POST', 'action'=> 'PostCommentController@store']) !!}


        <input type="hidden" name="post_id" value="{{$post->id}}">


        <div class="form-group">
            {!! Form::label('body', 'Body:') !!}
            {!! Form::textarea('body', null, ['class'=>'form-control','rows'=>3])!!}
        </div>

        <div class="form-group">
            {!! Form::submit('Comment', ['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}


    </div>
</div>
@endif



<hr>

<!-- Blog Comments -->



<!-- Posted Comments -->

<!-- Comment -->

@if (count($comments) >0)

@foreach ($comments as $comment)
<div class="media">
    <a class="pull-left" href="#">
        <img height="64" width="64" class="media-object" src="{{Auth::user()->gravatar}}" alt="">
    </a>
    <div class="media-body">
        <h4 class="media-heading">{{$comment->author}}
            <small>{{$comment->created_at->diffForHumans()}}</small>
        </h4>
        {{$comment->body}}
        @if (count($comment->replies) >0)

        <!-- Nested Comment -->
@foreach ($comment->replies as $reply)
        <div class="media">
            <a class="pull-left" href="#">
                <img height="64" width="64" class="media-object" src="{{asset($reply->photo)}}" alt="">
            </a>
            <div class="media-body">
                <h4 class="media-heading">{{$reply->author}}
                <small>{{$reply->created_at->diffForHumans()}}</small>
                </h4>
                {{$reply->body}}
            </div>

            <div class="comment-reply-container">


                <button class="toggle-reply btn btn-primary pull-right">Reply</button>


                <div class="comment-reply col-sm-6">

            {!! Form::open(['method'=>'POST', 'action'=> 'CommentReplyController@createReply']) !!}
            <div class="form-group">

                <input type="hidden" name="comment_id" value="{{$comment->id}}">

                {!! Form::label('body', 'Body:') !!}
                {!! Form::textarea('body', null, ['class'=>'form-control','rows'=>1])!!}
            </div>

            <div class="form-group">
                {!! Form::submit('submit', ['class'=>'btn btn-primary']) !!}
            </div>
       {!! Form::close() !!}
                </div>
            </div>
        </div>
        @endforeach
        <!-- End Nested Comment -->
        @endif
    </div>
</div>
@endforeach
@endif


@endsection
@section('script')
<script>
    $(".comment-reply-container .toggle-reply").click(function(){
        $(this).next().slideToggle("slow");

    });
</script>

@endsection
