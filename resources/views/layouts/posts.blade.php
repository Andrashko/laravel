@extends('layouts.app')

@section('title', 'Laravel posts demo')

@section('header')
    <p>Logo</p>
    <nav>
        <ul>
            <li>
                <a href="{{URL::to('posts')}}">
                    Home
                </a>
            </li>
            <li>
                <a href="{{route('about')}}">
                    About
                </a>
            </li>
        </ul>
    </nav>
@endsection

@section('footer')
    Yurii, 2023
@endsection
