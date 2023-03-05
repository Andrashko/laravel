@extends('layouts.posts')
@section('content')
    <p>
        Post {{$post->title}} was deleted
    </p>

    <p>
        <a href="{{URL::to('posts')}}"> Return </a> to posts list
    </p>
@endsection
