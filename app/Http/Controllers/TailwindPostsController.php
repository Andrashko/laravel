<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\View\View;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Gate;

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
    public function store(PostRequest $request): View
    {

//        $validated = $request->validate([
//            'title' => 'required|unique:posts|max:5',
//            'text' => 'required',
//        ]);
        $validated = $request->validated();
        $post = Post::create(
                $validated
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
    public function update(PostRequest $request, string $id): View
    {
        $validatedPost = $request->validated();
        $post = Post::find($id);
        $post->title = $validatedPost['title'];
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
        if (! Gate::allows('delete-post')) {
            abort(403, "Not allowed by gate");
        }

        $post = Post::find($id);
        if ($this->authorize('delete', $post)) {
            abort(403, "Not allowed by policy");
        }
        $post->delete();
        return view(
            'tailwind.post.resultpage',
            [
                'message' => "Post " . $post->title . " was deleted"
            ]
        );
    }
}
