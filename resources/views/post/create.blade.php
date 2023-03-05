@extends('layouts.posts')
@section('content')
    <h1> Create post</h1>

    <form action="{{URL::to('posts')}}" method="post">
        @csrf
        <label>
            Title
            <input name="title" type="text">
        </label>
        <br>
        <label> Text </label>
        <textarea name="text" rows="5" cols="50"></textarea>
        <br>
        <button type="submit">
            Create
        </button>
    </form>
@endsection