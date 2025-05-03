<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
  
    public function apiIndex()
    {
        $posts = Post::with('user')->latest()->get();
        return response()->json($posts);
    }

   
    public function apiShow($id)
    {
        $post = Post::with('user')->findOrFail($id);
        return response()->json($post);
    }

    
    public function apiStore(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
            'enabled' => 'required|boolean',
        ]);

        $post = Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'enabled' => $request->enabled,
            'user_id' => Auth::id()
        ]);

        Auth::user()->increment('posts_count');

        return response()->json($post, 201);
    }

    
    public function apiUpdate(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        if ($post->user_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
            'enabled' => 'required|boolean',
        ]);

        $post->update([
            'title' => $request->title,
            'body' => $request->body,
            'enabled' => $request->enabled,
        ]);

        return response()->json($post);
    }

    
    public function apiDestroy($id)
    {
        $post = Post::findOrFail($id);

        if ($post->user_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $post->delete();

        return response()->json(['message' => 'Post deleted successfully']);
    }
}