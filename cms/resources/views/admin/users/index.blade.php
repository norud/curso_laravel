<x-admin-master>
    @section('css')

    <!-- Custom styles for this page -->
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    @endsection

    @section('content')
    <h1>Users</h1>
    @if (session('message'))
<div class="alert alert-danger">
    {{ session('message')}}
</div>
@elseif (session('success'))
<div class="alert alert-success">
    {{ session('success')}}
</div>
@endif
                  <!-- DataTales Example -->
                  <div class="card shadow mb-4">
                    <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                    </div>
    <div class="card-body">
        <div class="table-responsive">
    <table class="table table-bordered" id="userDataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Id</th>
                <th>IMG</th>
                <th>username</th>
                <th>name</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Acctions</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Id</th>
                <th>IMG</th>
                <th>username</th>
                <th>name</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Acctions</th>
            </tr>
        </tfoot>
        <tbody>
            @foreach ($users as $user)

            <tr>
                <td>{{$user->id}}</td>
                <td><img class="img-profile rounded" style="
                    height: 80px;
                " src="{{$user->avatar}}"></td>
                <td>{{$user->username}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->created_at->diffForHumans()}}</td>
                <td>{{$user->updated_at->diffForHumans()}}</td>
                <td>
                <form action="{{route('user.destroy', $user)}}" method="post">
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
    @endsection
    @section('scripts')
    <!-- Page level plugins -->
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts-->
  <script src="{{asset('js/demo/datatables-demo.js')}}"></script>

    @endsection

</x-admin-master>
