@extends('tailwind.layouts.posts')
@section('content')
    <p class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl">
        {{$message}}
    </p>

    <p>
        <a href="{{URL::to('tailwind/posts')}}"> Return </a> to posts list
    </p>
@endsection