@extends('layouts.app')

@section('content')
<h1>Posts</h1>
@if ($posts)
<ul>
    @foreach ($posts as $p)
    <li>

        <h3>{{$p->title}}</h3>
        <a href="{{route('posts.show', $p->id)}}">Show
    </a> -/-
    <a href="{{route('posts.edit', $p->id)}}">Edit</a>
    <form method="POST" action="{{route('posts.index')}}/{{$p->id}}">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        <button type="submit">Delete</button>
    </form>
    <br>
</li>
    @endforeach
</ul>
@else
<h2>No hay Datos para mostrar!</h2>
@endif

@endsection

@section('footer')
    <script>
       // alert('ok');
    </script>
@endsection
