@extends('layouts.app')

@section('content')
<h1>Posts Order</h1>
@if ($posts)
<ul>
    @foreach ($posts as $p)
    <li>
    <img src="{{$p->path}}" alt="img" width="200" height="200">
        <h3>{{$p->title}}</h3>
        <a href="{{route('posts.show', $p->id)}}">Show
    </a> -/-
    <a href="{{route('posts.edit', $p->id)}}">Edit</a>
    {!! Form::open(['method' => 'DELETE', 'action' => ['PostsController@destroy', $p->id]]) !!}
        @csrf
    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

    {!! Form::close() !!}

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
