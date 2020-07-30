<x-admin-master>

    @section('content')
    <h1>Edit Permission: {{$permission->name}}</h1>
    @if (session('message'))
    <div class="alert alert-danger">
        {{ session('message')}}
    </div>
    @elseif (session('success'))
    <div class="alert alert-success">
        {{ session('success')}}
    </div>
    @endif
    <div class="row">
        <div class="col-sm-3">
            <form action="{{ route('permission.update', $permission)}}" method="post">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="name">Name</label>
                <input type="text" class="form-group @error('name') is-invalid @enderror" value="{{$permission->name}}" id="name" name="name">
                    <div>
                        @error('name')
                    <span class="text-danger" role="alert"><strong>{{$message}}</strong></span>
                        @enderror
                    </div>
                </div>
                <button class="btn btn-info" type="submit">Create</button>
            <a href="{{route('permissions.index')}}" class="btn btn-light ">Back</a>
            </form>
        </div>
    </div>

    @endsection
</x-admin-master>
