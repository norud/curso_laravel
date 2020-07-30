<x-admin-master>

    @section('content')
    <h1>permissions</h1>
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
            <form action="{{ route('permission.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-group @error('name') is-invalid @enderror" value="" id="name" name="name">
                    <div>
                        @error('name')
                    <span class="text-danger" role="alert"><strong>{{$message}}</strong></span>
                        @enderror
                    </div>
                </div>
                <button class="btn btn-info" type="submit">Create</button>

            </form>
        </div>
        <div class="col-sm-9">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Permission</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="userDataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>name</th>
                                    <th>slug</th>
                                    <th>Create At</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>name</th>
                                    <th>slug</th>
                                    <th>Create At</th>
                                    <th>Delete</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($permissions as $p)

                                <tr>
                                    <td>{{$p->id}}</td>
                                    <td><a href="{{route('permission.edit', $p)}}">{{$p->name}}</a></td>
                                    <td>{{$p->slug}}</td>
                                    <td>{{$p->created_at->diffForHumans()}}</td>
                                    <td>{{$p->updated_at->diffForHumans()}}</td>
                                    <td>
                                        <form action="{{route('permission.destroy', $p)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
</x-admin-master>
