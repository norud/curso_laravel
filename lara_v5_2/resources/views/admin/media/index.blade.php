@extends('layouts.admin')

@section('content')

    <h1>Media</h1>

    <div class="col-sm-9">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">File</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
                @if ($photos)
                @foreach ($photos as $photo)
                <tr>
                    <th scope="row">{{$photo->id}}</th>
                    <td><img height="100" src="{{asset($photo->file)}}" alt="IMG"></td>
                    <td>{{($photo->created_at)?$photo->created_at->diffForHumans():'-'}}</td>
                    <td>{{($photo->updated_at)?$photo->updated_at->diffForHumans():'-'}}</td>
                    <td>
                        {!! Form::open(['method'=>'DELETE', 'action'=> ['AdminMediaController@destroy', $photo->id]]) !!}
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
