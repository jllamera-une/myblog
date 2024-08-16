<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // create a variable and store all the blog posts in it from the database
        //$posts = Post::all();
        $posts = Auth::user()->posts;
        //dd($posts);
        //return a view ans pass in the above variable
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate data
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        // store in the database
        $post = new Post;

        $post->title = $request->title;
        $post->content = $request->content;

        $post->save();
        //Post::create($request->all());

        // redirect to another page
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Post $post)
    {
        if(Auth::id() != $post -> user_id) {
            abort(403);
        }   
        
        //$post = Post::find($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // find the post in the database and save as a var
        $post = Post::find($id);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // validate the data
        $data = $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        // save the data to the database
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->update($data);

        // redirect with flash data to posts.show
        return redirect()->route('posts.show', $post->id)->with('Success', 'Post Updated Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);

        $post->delete();

        return redirect()->route('posts.index')->with('Success', 'Product deleted successfully');
    }
}
