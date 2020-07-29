<x-admin-master>
    @section('css')

    <!-- Custom styles for this page -->
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    @endsection
    @section('content')
    <h1>All Posts</h1>
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
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                            <th>Id</th>
                            <th>Owner</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Acctions</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>Id</th>
                          <th>Owner</th>
                          <th>Title</th>
                          <th>Image</th>
                          <th>Created At</th>
                          <th>Updated At</th>
                          <th>Acctions</th>
                        </tr>
                      </tfoot>
                      <tbody>
                          @foreach ($post as $p)

                        <tr>
                        <td>{{$p->id}}</td>
                        <td>{{$p->user->name}}</td>
                          <td><a href="{{route('post.edit', $p->id)}}">{{$p->title}}</a></td>
                        <td><img src="{{$p->post_image}}" alt="IMG" width="100" height="50"></td>
                          <td>{{$p->created_at->diffForHumans()}}</td>
                        <td>{{$p->updated_at->diffForHumans()}}</td>
                        <td>
                            @can('view', $p)

                        <form action="{{route('post.destroy', $p->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                            @endcan
                        </td>
                        </tr>

                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

<div class="d-flex">
    <div class="mx-auto">
        {{$post->links()}}
    </div>
</div>

    @endsection
    @section('scripts')
    <!-- Page level plugins -->
  <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

  <!-- Page level custom scripts
  <script src="{{asset('js/demo/datatables-demo.js')}}"></script>-->

    @endsection
</x-admin-master>
