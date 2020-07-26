@extends('layouts.app')

@section('content')
<h1>Create Post</h1>

<form method="POST" action="{{route('posts.store')}}">
    @csrf
   <input type="text" name="title" value="" placeholder="enter the title"><br>
   <textarea name="content" id="" cols="30" rows="3" placeholder="enter content"></textarea>
   <button class="bt bt-success" type="submit">Create</button>
</form>

@endsection

@section('footer')
    <script>
       // alert('ok');
    </script>
@endsection
