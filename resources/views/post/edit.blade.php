@extends('layouts.posts')
@section('content')
    <h1> Edit post</h1>

    <form action="{{URL::to('posts') .'/' . $post->id}}" method="post">
        @csrf
        <input type="hidden" name="_method" value="PATCH">
        <label>
            Title
            <input name="title" type="text" value="{{$post->title}}">
        </label>
        <br>
        <label> Text </label>
        <textarea name="text" rows="5" cols="50">{{$post->text}}</textarea>
        <br>
        <button type="submit">
            Edit
        </button>
    </form>
@endsection