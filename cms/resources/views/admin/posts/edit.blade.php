<x-admin-master>
    @section('content')
    <h1>Edit a Post</h1>
<form action="{{route('post.update', $post->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <div><img src="{{$post->post_image}}" alt="IMG" width="200" height="125"></div>
            <label for="formGroupExampleInput">File</label>
        <input type="file" class="form-control" name="post_image"  placeholder="Example input">
          </div>
        <div class="form-group">
          <label for="formGroupExampleInput">Titulo</label>
          <input type="text" class="form-control" name="title" value="{{$post->title}}" placeholder="Example input">
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput2">Content</label>
          <textarea name="body" class="form-control" id="" cols="30">{{$post->body}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    @endsection
</x-admin-master>
