@extends('layouts.admin')

@section('content')
<h1>Update User: {{$user->name}}</h1>

@include('includes.form_error')

<div class="row">
    <div class="col-sm-3">
        <div class="img-responsive img-rounded">
        <img src="{{asset($user->photo->file)}}" alt="img" height="100">
        </div>
    </div>
    <div class="col-sm-6">
        {!! Form::model($user, ['method' => 'PATCH', 'action' => ['AdminUserController@update', $user], 'files' => true]) !!}

        <div class="form-group">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', null, ['class'=>'form-control'])!!}
        </div>


        <div class="form-group">
            {!! Form::label('email', 'Email') !!}
            {!! Form::email('email', null, ['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('role_id', 'Select Role') !!}
            {{--here we pas the array from the controller we pass the first empty to show = choose options--}}
            {!! Form::select('role_id', [''=>'Choose Options'] + $roles , null, ['class'=>'form-control'])!!}
        </div>


        <div class="form-group">
            {!! Form::label('is_active', 'Status') !!}
            {!! Form::select('is_active', array(1 => 'Active', 0=> 'Not Active'), null , ['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('photo_id', 'Photo') !!}
            {!! Form::file('photo_id', null, ['class'=>'form-control'])!!}
         </div>

        <div class="form-group">
            {!! Form::label('password', 'Password') !!}
            {!! Form::password('password', ['class'=>'form-control'])!!}
        </div>


        <div class="form-group">
            {!! Form::submit('Create', ['class'=>'btn btn-info col-sm-6']) !!}
        </div>

        {!! Form::close() !!}

        {!! Form::open(['method' => 'DELETE', 'action' => ['AdminUserController@destroy', $user->id], 'files' => true]) !!}
        <div class="form-group">
            {!! Form::submit('Delete', ['class'=>'btn btn-danger col-sm-6']) !!}
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
