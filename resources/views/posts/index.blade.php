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
