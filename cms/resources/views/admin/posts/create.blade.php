<x-admin-master>
    @section('content')
    <h1>Create a Post</h1>
<form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="formGroupExampleInput">File</label>
            <input type="file" class="form-control" name="post_image" id="formGroupExampleInput" placeholder="Example input">
          </div>
        <div class="form-group">
          <label for="formGroupExampleInput">Titulo</label>
          <input type="text" class="form-control" name="title" id="formGroupExampleInput" placeholder="Example input">
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput2">Content</label>
          <textarea name="body" class="form-control" id="" cols="30"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    @endsection
</x-admin-master>
