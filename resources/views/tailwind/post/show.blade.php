@extends('tailwind.layouts.posts')
@section('content')

    <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl">
       Post: {{$post->title }}
    </h1>
    <p class="font-bold text-xl mb-2">
        {{$post->text}}
    </p>

    @include('tailwind.comment.index')
    @include('tailwind.comment.create', ['post_id'=>$post->id])

@endsection
