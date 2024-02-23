<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function create()
    {
        return view('posts/create');
    }

    public function store(Request $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = $request->user()->id;
        $post->save();
        return redirect('/posts/create');
    }

    public function index()
    {
        $all_posts = Post::all();
        return view('posts.index', ['posts' => $all_posts]);
    }


    public function edit($id)
    {
        return view('posts.edit', [
            'post' => Post::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->title = $request->title;
        $post->content = $request->content;
        if ($post->save()) {
            return redirect()->route('posts.index');
        }
    }
    public function destroy($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return redirect()->route('posts.index')->with('error', 'Post not found');
        }
        $post->delete();
        return redirect()->route('posts.index');
    }
}