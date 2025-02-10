<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

abstract class Controller
{
    public function index()
    {
        return response()->json(Post::all(), 200);
    }

    public function store(Request $request)
    {
        $post = Post::create($request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]));
        return response()->json($post, 201);
    }

    public function show(Post $post)
    {
        return response()->json($post, 200);
    }

    public function update(Request $request, Post $post)
    {
        $post->update($request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]));
        return response()->json($post, 200);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json(['message' => 'Post deleted'], 200);
    }
}
