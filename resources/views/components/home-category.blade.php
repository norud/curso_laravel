<div class="card my-4">
    <h5 class="card-header">Categories</h5>
    <div class="card-body">
      <div class="row">
        <div class="col-lg-6">
          <ul class="list-unstyled mb-0">
              @foreach ($users as $u)
              <li>
              <a href="#">{{$u->name}}</a>
              </li>

              @endforeach

          </ul>
        </div>
      </div>
    </div>
  </div>
