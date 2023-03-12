<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\View\View;

class TailwindPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $posts = Post::all();
        return view(
            'tailwind.post.index',
            ['posts' => $posts]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('tailwind.post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): View
    {
        $post = Post::create(
            $request->all(['title', 'text'])
        );
        return view(
            'tailwind.post.resultpage',
            [
                'message' => "Post " . $post->title . " was created"
            ]
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $post = Post::find($id);
        return view(
            'tailwind.post.show',
            [
                'post' => $post,
                'comments' => $post->comments
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $post = Post::find($id);
        return view(
            'tailwind.post.edit',
            ['post' => $post]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): View
    {
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->text = $request->input('text');
        $post->save();
        return view(
            'tailwind.post.resultpage',
            [
                'message' => "Post " . $post->title . " was updated"
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): View
    {
        $post = Post::find($id);
        $post->delete();
        return view(
            'tailwind.post.resultpage',
            [
                'message' => "Post " . $post->title . " was deleted"
            ]
        );
    }
}
