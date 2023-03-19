@extends('layouts.posts')

@section('content')
    <h1>Posts</h1>

    <a href="{{URL::to('posts') . '/create'}}"> Create new post </a>
    @forelse($posts as $post)
        <article>
            <h3>
                <a href="{{URL::to('posts') . '/' . $post->id}}">
                    {{$post->title}}
                </a>
            </h3>
            <a href="{{URL::to('posts') . '/' . $post->id . '/edit'}}">
                Edit
            </a>
            <form action="{{URL::to('posts') . '/' . $post->id}}" method="post">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit"> Delete</button>
            </form>
            <p>
                {{$post->text}}
            </p>
            <p> {{ count($post->comments) }} comments </p>
        </article>
    @empty
        <p>
            No posts
        </p>
    @endforelse

@endsection
