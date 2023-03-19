@extends('layouts.posts')

@section('content')

    <h1> Show post </h1>

    <h3> {{$post->title }}</h3>
    <p>
        {{$post->text}}
    </p>

    @include('comment.index')
    @include('comment.create', ['post_id'=>$post->id])

@endsection
