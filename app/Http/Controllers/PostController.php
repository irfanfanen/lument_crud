<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Create
    public function create(Request $request)
    {
        $post = Post::create($request->all());
        return response()->json($post, 201);
    }

    // Read (All Posts)
    public function index()
    {
        $posts = Post::all();
        return response()->json($posts);
    }

    // Read (Single Post)
    public function show($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return response()->json(['message' => 'Post not found'], 404);
        }
        return response()->json($post);
    }

    // Update
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        if (!$post) {
            return response()->json(['message' => 'Post not found'], 404);
        }

        $post->update($request->all());
        return response()->json($post);
    }

    // Delete
    public function destroy($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return response()->json(['message' => 'Post not found'], 404);
        }

        $post->delete();
        return response()->json(['message' => 'Post deleted successfully']);
    }
}