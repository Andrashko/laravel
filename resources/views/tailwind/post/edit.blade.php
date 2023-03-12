@extends('tailwind.layouts.posts')
@section('content')
    <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl">
        Edit post
    </h1>

    <form
            action="{{URL::to('tailwind/posts') .'/' . $post->id}}" method="post"
            class="w-full max-w-lg"
    >
        @csrf
        <input type="hidden" name="_method" value="PATCH">
        <label for="title"
               class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
        >
            Title
        </label>
        <input name="title" type="text" id="title"
               class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
               value="{{$post->title}}">

        <label for="text"
               class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
        >
        <textarea
                name="text" rows="5" id="text"
                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
        >{{$post->text}}</textarea>
            <button type="submit"
                    class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 w-full"
            >
                Edit
            </button>
    </form>
@endsection