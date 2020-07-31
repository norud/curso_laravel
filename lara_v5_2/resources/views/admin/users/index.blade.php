@extends('layouts.admin')

@section('content')
<h1>Users</h1>
@if (Session::has('success'))
<div class="alert-success">
    {{session('success')}}
</div>

@endif
<div class="row">
    <div class="col-sm-6">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Status</th>
                    <th scope="col">Creat At</th>
                    <th scope="col">Update At</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if ($users)

                @foreach ($users as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <th ><img height="45" src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}" alt="IMG" >
                        </th>
                    <td><a href="{{route('admin.users.edit', $user)}}">{{$user->name}} </a></td>
                    <td> {{$user->email}}</td>
                    <td> {{$user->role ? $user->role->name : 'User has no role'}}</td>
                    <td>{{ ($user->is_active)? 'Active':'Not Active'}}</td>
                    <td> {{$user->created_at->diffForHumans()}}</td>
                    <td> {{$user->updated_at->diffForHumans()}}</td>
                    <td>
                        {!! Form::open(['method' => 'DELETE', 'action' => ['AdminUserController@destroy', $user], 'files' => true]) !!}
                        <div class="form-group">
                            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>

    </div>

</div>

@endsection
