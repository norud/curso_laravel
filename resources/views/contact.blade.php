@extends('layouts.app')

@section('content')
<h1>Contact page</h1>
@if (count($people))
<ul>
@foreach ($people as $i)
<li>{{$i}}</li>
@endforeach
</ul>
@endif
@endsection

@section('footer')
    <script>
       // alert('ok');
    </script>
@endsection
