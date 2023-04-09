@extends('tailwind.layouts.posts')
@section('content')

    <nav class="flex">
        <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl flex-grow">
            Posts
        </h1>

        <a href="{{URL::to('tailwind/posts') . '/create'}}"
           class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-2xl px-5 py-2.5 text-center mr-2 mb-2"
        >
            Create new post
        </a>
    </nav>

    @forelse($posts as $post)
        <article class="max-w-2xl rounded overflow-hidden shadow-lg my-10 px-1.5">
            <nav class="flex">
                <h3 class="font-bold text-xl mb-2 flex-grow text-center">
                    <a href="{{URL::to('tailwind/posts') . '/' . $post->id}}">
                        {{$post->title}}
                    </a>
                </h3>
                <a href="{{URL::to('tailwind/posts') . '/' . $post->id . '/edit'}}"
                   class="button text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                    Edit
                </a>
                <form action="{{URL::to('tailwind/posts') . '/' . $post->id}}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit"
                            class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                        Delete
                    </button>
                </form>
            </nav>
            <p class="text-gray-700 text-base p-6">
                {{$post->text}}
            </p>
            <p class="text-blue-800"> {{ count($post->comments) }} comments </p>
        </article>
    @empty
        <p>
            No posts
        </p>
    @endforelse

@endsection
