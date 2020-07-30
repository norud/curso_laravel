<x-admin-master>

    @section('content')
    <h1>Edit Role: {{$role->name}}</h1>
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
            <form action="{{ route('roles.update', $role)}}" method="post">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="name">Name</label>
                <input type="text" class="form-group @error('name') is-invalid @enderror" value="{{$role->name}}" id="name" name="name">
                    <div>
                        @error('name')
                    <span class="text-danger" role="alert"><strong>{{$message}}</strong></span>
                        @enderror
                    </div>
                </div>
                <button class="btn btn-info" type="submit">Create</button>
            <a href="{{route('roles.index')}}" class="btn btn-light ">Back</a>
            </form>
        </div>
    </div>
<div class="row">
    <div class="col sm-12">
        @if ($permissions->isNotEmpty())
                    <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Permissions</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="userDataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Options</th>
                                    <th>Id</th>
                                    <th>name</th>
                                    <th>slug</th>
                                    <th>Attach</th>
                                    <th>Detach</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Options</th>
                                    <th>Id</th>
                                    <th>name</th>
                                    <th>slug</th>
                                    <th>Attach</th>
                                    <th>Detach</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($permissions as $p)

                                <tr>
                                    <td><input type="checkbox"
                                        @foreach ($role->permissions as $r_p)
                                        @if ($r_p->slug == $p->slug)
                                        checked
                                        @endif
                                        @endforeach
                                         ></td>
                                    <td>{{$p->id}}</td>
                                    <td>{{$p->name}}</td>
                                    <td>{{$p->slug}}</td>
                                    <td>
                                        <form action="{{route('role.permission.attach', $role)}}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="permission" value="{{$p->id}}">
                                            <button type="submit" class="btn btn-info
                                            "
                                            @if ($role->permissions->contains($p))
                                            disabled
                                           @endif
                                            >Attach</button>
                                        </form>

                                        </td>
                                        <td>
                                            <form action="{{route('role.permission.detach', $role)}}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="permission" value="{{$p->id}}">
                                                <button type="submit" class="btn btn-danger"
                                                @if (!$role->permissions->contains($p))
                                                disabled
                                               @endif
                                                >Detach</button>
                                            </form>
                                       </td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endif
    </div>
</div>
    @endsection
</x-admin-master>
