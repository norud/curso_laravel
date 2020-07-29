<x-admin-master>

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
                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{auth()->user()->username}}" required autocomplete="username" autofocus>
                    @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                  </div>

                <div class="form-group">
                    <label for="name">Name</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{auth()->user()->name}}" required autocomplete="name" autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                  </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{auth()->user()->email}}" required autocomplete="email">
                  @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Password Confirm</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                  </div>

                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </div>

    @endsection
</x-admin-master>
