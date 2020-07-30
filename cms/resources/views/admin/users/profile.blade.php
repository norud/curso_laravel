<x-admin-master>
    @section('css')

    <!-- Custom styles for this page -->
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    @endsection
    @section('content')
    <h1>User Profile fro: {{auth()->user()->name}}</h1>

    <div class="row">
        <div class="col-sm-6">
            <form action="{{route('user.update', auth()->user())}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <img class="img-profile rounded-circle" src="{{auth()->user()->avatar}}" style="
                    height: 50;
                    width: 50;
                ">
                </div>

                <div class="form-group">
                    <label for="name">Img</label>
                    <input type="file" class="form-control" name="avatar" placeholder="Enter name" value="">
                </div>

                <div class="form-group">
                    <label for="username">User Name</label>
                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror"
                        name="username" value="{{auth()->user()->username}}" required autocomplete="username" autofocus>
                    @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="name">Name</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{auth()->user()->name}}" required autocomplete="name" autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{auth()->user()->email}}" required autocomplete="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Password Confirm</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        autocomplete="new-password">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Roles</h6>
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
                                @foreach ($roles as $role)

                                <tr>
                                    <td><input type="checkbox"
                                        @foreach ($user->roles as $u_r)
                                        @if ($u_r->slug == $role->slug)
                                        checked
                                        @endif
                                        @endforeach
                                         ></td>
                                    <td>{{$role->id}}</td>
                                    <td>{{$role->name}}</td>
                                    <td>{{$role->slug}}</td>
                                    <td>
                                        <form action="{{route('user.role.attach', $user)}}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="role" value="{{$role->id}}">
                                            <button type="submit" class="btn btn-info
                                            "
                                            @if ($user->roles->contains($role))
                                            disabled
                                           @endif
                                            >Attach</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{route('user.role.detach', $user)}}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="role" value="{{$role->id}}">
                                            <button type="submit" class="btn btn-danger"
                                            @if (!$user->roles->contains($role))
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
        </div>
    </div>
    @endsection

    @section('scripts')
    <!-- Page level plugins -->
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts-->
  <script src="{{asset('js/demo/datatables-demo.js')}}"></script>

    @endsection
</x-admin-master>
