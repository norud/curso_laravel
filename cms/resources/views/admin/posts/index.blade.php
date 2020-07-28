<x-admin-master>
    @section('css')

    <!-- Custom styles for this page -->
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    @endsection
    @section('content')
    <h1>All Posts</h1>

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
                        </tr>
                      </tfoot>
                      <tbody>
                          @foreach ($posts as $p)

                        <tr>
                        <td>{{$p->id}}</td>
                        <td>{{$p->user->name}}</td>
                          <td>{{$p->title}}</td>
                        <td><img src="{{$p->post_image}}" alt="IMG" width="100" height="50"></td>
                          <td>{{$p->created_at->diffForHumans()}}</td>
                        <td>{{$p->updated_at->diffForHumans()}}</td>
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

  <!-- Page level custom scripts -->
  <script src="{{asset('js/demo/datatables-demo.js')}}"></script>

    @endsection
</x-admin-master>
