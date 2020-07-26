@extends('layouts.app')

@section('content')
<h1>Edit Post #{{$post->id}}</h1>


    {!! Form::model($post, ['method' => 'PATCH','action' => ['PostsController@update', $post->id]]) !!}
    @csrf
    {!! Form::label('title', 'Title') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}<br>

    {!! Form::label('content', 'Content') !!}
    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}

   {!! Form::submit('Update', ['class' => 'btn btn-success']) !!}
{!! Form::close() !!}

@endsection

@section('footer')
    <script>
       // alert('ok');
    </script>
@endsection
