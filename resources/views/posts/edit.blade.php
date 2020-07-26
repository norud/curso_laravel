@extends('layouts.app')

@section('content')
<h1>Edit Post #{{$post->id}}</h1>

<form method="POST" action="{{route('posts.index')}}/{{$post->id}}">
    @csrf
    <input type="hidden" name="_method" value="PUT">
<input type="text" name="title" value="{{$post->title}}" placeholder="enter the title"><br>
   <textarea name="content" id="" cols="30" rows="3" placeholder="enter content">{{$post->content}}</textarea>
   <button class="bt bt-success" type="submit">Update</button>
</form>

@endsection

@section('footer')
    <script>
       // alert('ok');
    </script>
@endsection
