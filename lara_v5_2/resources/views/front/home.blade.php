@extends('layouts.blog-home')

@section('content')
<h1 class="page-header">
    Post
    <small>All our posts</small>
</h1>
@if (count($posts))

@foreach ($posts as $post)
<!-- First Blog Post -->
<h2>
    <a href="{{route('home.post', $post->slug)}}">{{$post->title}}</a>
</h2>
<p class="lead">
    by <a href="index.php">{{$post->user->name}}</a>
</p>
<p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at->diffForHumans()}}</p>
<hr>
<img class="img-responsive" src="{{$post->photo ? asset($post->photo->file) : 'http://placehold.it/400x400'}}" alt="">
<hr>
<p>
    {{str_limit($post->body, 220)}}
</p>
<a class="btn btn-primary" href="{{route('home.post', $post->slug)}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

<hr>
@endforeach
<!-- pagintation -->
<div class="row">
    <div class="col-sm-6 col-sm-offset-5">
        {{$posts->render()}}
    </div>
</div>
@endif

@endsection
