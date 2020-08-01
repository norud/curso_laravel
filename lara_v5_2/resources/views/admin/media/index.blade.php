@extends('layouts.admin')

@section('content')

    <h1>Media</h1>


    <div class="col-sm-9">
        <form action="/delete/media" method="post" class="form-inline">
            {{ csrf_field() }}
            {{method_field('delete')}}
            <div class="form-group">
                <select name="options" id="" class="form-control">
                    <option value="delete">Delete</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="delete_all">
            </div>
        <table class="table">
            <thead>
              <tr>
                <th scope="col"><input class="checkbox" type="checkbox"  id="options"></th>
                <th scope="col">#</th>
                <th scope="col">File</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
                @if ($photos)
                @foreach ($photos as $photo)
                <tr>
                    <td><input class="checkbox" type="checkbox" name="checkBoxArray[]" id="checkBoxArray" value="{{$photo->id}}"></td>
                    <th scope="row">{{$photo->id}}</th>
                    <td><img height="100" src="{{asset($photo->file)}}" alt="IMG"></td>
                    <td>{{($photo->created_at)?$photo->created_at->diffForHumans():'-'}}</td>
                    <td>{{($photo->updated_at)?$photo->updated_at->diffForHumans():'-'}}</td>
                    <td>
                        <input type="hidden" name="photo" value="{{$photo->id}}">
                            <input type="submit" name="delete_one" value="Delete" class="btn btn-ganger">

                    </td>
                  </tr>
                @endforeach
                @endif

            </tbody>
          </table>
        </form>
    </div>

@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('#options').click(function(){

            if(this.checked){

            $('.checkbox').each(function(){
                this.checked = true
            });
            }else{
                $('.checkbox').each(function(){
                this.checked = false
            });
            }
        });


    });
</script>

@endsection
