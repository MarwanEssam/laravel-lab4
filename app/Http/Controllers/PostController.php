<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function create()
    {
        return view('posts/create');
    }

    public function store(PostRequest $request)
    {
        // $request->validate(['title' => 'required|min:3', 'content' => 'required|min:3']);
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = $request->user()->id;
        $post->save();
        return redirect('/posts/create')->with('success', 'Post created successfully');
    }

    public function index()
    {
        return view('posts.index', ['posts' => Auth::user()->posts]);
    }


    public function edit(Post $id)
    {
        return view('posts.edit', [
            'post' => $id
        ]);
    }

    public function update(Request $request, Post $id)
    {
        $id->title = $request->title;
        $id->content = $request->content;
        if ($id->save()) {
            return redirect()->route('posts.index');
        }
    }
    public function destroy(Post $id)
    {
        if (!$id) {
            return redirect()->route('posts.index')->with('error', 'Post not found');
        }
        $id->delete();
        return redirect()->route('posts.index');
    }
}