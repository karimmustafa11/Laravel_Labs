<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class PostController extends Controller
{
    public function index()
    {
        $posts = \App\Models\Post::with('user')->latest()->paginate(5);
        return view('posts.index', compact('posts'));
    }
    
    

    public function create()
    {
        $users = \App\Models\User::all(); 
        return view('posts.create', compact('users'));
    }
    


    public function show(Post $post)
    {
        $post->refresh(); 
        return view('posts.show', compact('post'));
    }
    

public function edit($id)
{
    $post = \App\Models\Post::findOrFail($id);
    $users = \App\Models\User::all();
    return view('posts.edit', compact('post', 'users'));
}

public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string',
        'body' => 'required|string',
        'enabled' => 'required|boolean',
        'user_id' => 'required|exists:users,id',
    ]);

    Post::create([
        'title' => $request->title,
        'body' => $request->body,
        'enabled' => $request->enabled,
        'user_id' => $request->user_id,
    ]);

    return redirect()->route('posts.index');
}

public function destroy(Post $post)
{
    $post->delete(); 
    return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
}

public function update(Request $request, Post $post)
{
    $request->validate([
        'title' => 'required|string',
        'body' => 'required|string',
        'enabled' => 'required|boolean',
        'user_id' => 'required|exists:users,id',
    ]);

    $post->update([
        'title' => $request->title,
        'body' => $request->body,
        'enabled' => $request->enabled,
        'user_id' => $request->user_id,
    ]);

    return redirect()->route('posts.index')->with('success', 'Post updated successfully');
}


}
