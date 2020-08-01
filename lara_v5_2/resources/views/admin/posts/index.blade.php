@extends('layouts.admin')


@section('content')

<h1>Posts</h1>

@if (Session::has('success'))
<div class="alert-success">
    {{session('success')}}
</div>

@endif
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
                                    <th scope="col">owner</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Photo</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Body</th>
                                    <th scope="col">View Post</th>
                                    <th scope="col">Comments</th>
                                    <th scope="col">Creat At</th>
                                    <th scope="col">Update At</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($posts)

                                @foreach ($posts as $p)
                                <tr>
                                    <th scope="row">{{$p->id}}</th>
                                    <td> {{$p->user ? $p->user->name : 'Not owner'}}</td>
                                    <td>{{$p->category ? $p->category->name : 'Not categorized'}}</td>
                                    <th><img height="45"
                                            src="{{$p->photo ? asset($p->photo->file) : 'http://placehold.it/400x400'}}"
                                            alt="IMG">
                                    </th>
                                    <td><a href="{{route('admin.posts.edit', $p)}}">{{$p->title}} </a></td>
                                    <td> {{str_limit($p->body, 10)}}</td>
                                    <td><a href="{{route('home.post', $p->slug)}}">View Post</a></td>
                                    <td><a href="{{route('admin.comments.show', $p->id)}}">View Comments</a></td>
                                    <td> {{$p->created_at->diffForHumans()}}</td>
                                    <td> {{$p->updated_at->diffForHumans()}}</td>
                                    <td>
                                        {!! Form::open(['method' => 'DELETE', 'action' =>
                                        ['AdminUserController@destroy', $p], 'files' => true]) !!}
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
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-5">
                            {{$posts->render()}}
                        </div>
                    </div>
@endsection
