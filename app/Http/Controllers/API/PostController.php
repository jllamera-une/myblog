<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return response()->json([
            'data' => $posts,
            'message' => 'success'
        ], 200);
    }
    // Retrieve a single post by ID
    public function show($id)
    {
        // Find the post by ID or return a 404 if not found
        $post = Post::findOrFail($id);

        return response()->json([
            'data' => $post,
            'message' => 'success'
        ], 200);
    }
}
