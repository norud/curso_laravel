@extends('layouts.app')

@section('content')
<h1>Show Post # {{$post->id}}</h1>
@if ($post)
<ul>
    <li>
    <h3>{{$post->title}}</h3>
    {{$post->content}}<br>
</li>
</ul>
@else
<h2>No hay Datos para mostrar!</h2>
@endif

@endsection

@section('footer')
    <script>
       // alert('ok');
    </script>
@endsection
