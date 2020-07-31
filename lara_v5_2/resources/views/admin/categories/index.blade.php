@extends('layouts.admin')

@section('content')

    <h1>All Categories</h1>
    <div class="col-sm-3">
        {!! Form::open(['method'=>'POST', 'action'=> 'AdminCategoryController@store']) !!}
             <div class="form-group">
                 {!! Form::label('name', 'Name:') !!}
                 {!! Form::text('name', null, ['class'=>'form-control'])!!}
             </div>

             <div class="form-group">
                 {!! Form::submit('Create', ['class'=>'btn btn-primary']) !!}
             </div>
        {!! Form::close() !!}

    </div>

    <div class="col-sm-9">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
                @if ($categories)
                @foreach ($categories as $c)
                <tr>
                    <th scope="row">{{$c->id}}</th>
                    <td><a href="{{route('admin.categories.edit', $c->id)}}">{{$c->name}}</a></td>
                    <td>{{($c->created_at)?$c->created_at->diffForHumans():'-'}}</td>
                    <td>{{($c->updated_at)?$c->updated_at->diffForHumans():'-'}}</td>
                    <td>
                        {!! Form::open(['method'=>'DELETE', 'action'=> ['AdminCategoryController@destroy', $c->id]]) !!}
                            {!! Form::submit('Delete', ['class'=>'btn btn-danger col-sm-6']) !!}
                        {!! Form::close() !!}
                    </td>
                  </tr>
                @endforeach
                @endif

            </tbody>
          </table>
    </div>

@endsection
