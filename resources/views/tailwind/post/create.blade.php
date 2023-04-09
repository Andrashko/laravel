@extends('tailwind.layouts.posts')
@section('content')
    <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl">
        Create post
    </h1>

    @include("tailwind.errors")

    <form
            action="{{URL::to('tailwind/posts')}}" method="post"
            class="w-full max-w-lg"
    >
        @csrf
        <label for="title"
               class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
        >
        Title
        </label>
        <input
                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                name="title"
                type="text"
                id="title"
                value="{{old('title')}}"
        >
        @error('title')
            <div>
                {{ $message }}
            </div>
        @enderror
        <label for="text"
               class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
        >
            Text
        </label>
        <textarea
                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                name="text" rows="10" id="text">{{old('text')}}</textarea>
        @error('text')
            <div class="text-2xl">
                {{ $message }}
            </div>
        @enderror
        <button type="submit"
                class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 w-full"
        >
            Create
        </button>
    </form>
@endsection