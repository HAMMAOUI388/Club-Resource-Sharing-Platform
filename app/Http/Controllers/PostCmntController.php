<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Exception;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class PostCmntController extends Controller
{
    // Show all posts with their comments
    public function index()
    {
        $posts = Post::with('comments.user', 'user')->latest()->get();
        return view('home', compact('posts'));
    }

    // Show a single post by slug
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->with('comments.user')->first();

        if (!$post) {
            return view('post-not-found');
        }

        return view('posts.show', compact('post'));
    }





    public function storePost(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'body' => 'required|string',
    ]);

    try {
        $slug = Str::slug($validated['title']);
        if (Post::where('slug', $slug)->exists()) {
            $slug .= '-' . time();
        }

        $post = Post::create([
            'title' => $validated['title'],
            'body' => $validated['body'],
            'user_id' => Auth::id(),
            'slug' => $slug,
        ]);

        $post->load('user'); // Load user info
        //     // Return a plain success message
        //     return response('Post created successfully!', 200);
        // } catch (\Exception $e) {
        //     return response('Error creating post: ' . $e->getMessage(), 500);
        // }
        // Return JSON response with the new post and user data
        return response()->json(['post' => $post], 201);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Error creating post: ' . $e->getMessage()], 500);
    }
}

    


    public function store(Request $request, Post $post)
{
    $request->validate([
        'body' => 'required|string|max:1000',
    ]);

    try {
        $comment = $post->comments()->create([
            'body' => $request->body,
            'user_id' => Auth::id(),
        ]);

        $comment->load('user'); // Load user info
        //     // Return a plain success message
        //     return response('Comment added successfully!', 200);
        // } catch (\Exception $e) {
        //     return response('Error adding comment: ' . $e->getMessage(), 500);
        // }
        // Return JSON response with the new comment and user data
        return response()->json(['comment' => $comment], 201);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Error adding comment: ' . $e->getMessage()], 500);
    }
}



public function community()
{
    $posts = Post::with('user', 'comments.user')->latest()->get();
    return view('posts.community', compact('posts'));
}


    
}
