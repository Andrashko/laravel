<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\View\View;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $posts = Post::all();
        $minId = $request->query->get("min", 0);
        $posts = Post::where('id', '>', $minId)->get();
        return view(
            'post.index',
            ['posts' => $posts]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): View
    {
//        $post = new Post();
//        $post->title = $request->input('title');
//        $post->text = $request->input('text');
//        $post->save();

        $post = Post::create(
            $request->all(['title', 'text'])
        );
        return view(
            'post.store',
            ['post' => $post]
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $post = Post::find($id);
        if (!isset($post))
        {
            return abort(404);
        }
        return view(
            'post.show',
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
        if (!isset($post))
        {
            return abort(404);
        }
        return view(
            'post.edit',
            ['post' => $post]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): View
    {
        $post = Post::find($id);
        if (!isset($post))
        {
            return abort(404);
        }
        $post->title = $request->input('title');
        $post->text = $request->input('text');
        $post->save();
        return view(
            'post.update',
            [
                'post' => $post
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): View
    {
        $post = Post::find($id);
        if (!isset($post))
        {
            return abort(404);
        }
        $post->delete();
        return view(
            'post.destroy',
            ['post' => $post]
        );
    }
}
