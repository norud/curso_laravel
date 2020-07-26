@extends('layouts.app')

@section('content')
<h1>Create Post</h1>

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $e)
        <li>{{$e}}</li>
            @endforeach
        </ul>
    </div>
@endif
    {!! Form::open(['method' => 'post', 'action' => 'PostsController@store', 'files' => true]) !!}
    @csrf

    <div class="form-group">
        {!! Form::label('title', 'Title') !!}
        {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Enter title']) !!}
    </div>
   <div class="form-group">
    {!! Form::label('content', 'Content') !!}
    {!! Form::textarea('content', null, ['class' => 'form-control', 'placeholder' => 'Enter contet',
    'rows' => '3']) !!}
   </div>
   <div class="form-group">
    {!! Form::file('file', ['class' => 'form-control']) !!}
</div>
   {!! Form::submit('Create', ['class' => 'bt bt-success']) !!}
{!! Form::close() !!}

@endsection

@section('footer')
    <script>
       // alert('ok');
    </script>
@endsection
