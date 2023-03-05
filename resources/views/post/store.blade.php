@extends('layouts.posts')
@section('content')
    <p>
        Post {{$post->title}} was stored
    </p>

    <p>
        <a href="{{URL::to('posts')}}"> Return </a> to posts list
    </p>
@endsection