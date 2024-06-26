<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::whereIsPublished(true)->latest()->with('category', 'tags')->get();

        foreach ($posts as $post) {
            if ($post->image) $post->image = url('storage/' . $post->image);
        }

        return response()->json($posts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        // $post = Post::whereIsPublished(true)->find($id);
        $post = Post::whereIsPublished(true)->whereSlug($slug)->with('category', 'tags')->first();
        if ($post->image) $post->image = url('storage/' . $post->image);
        if (!$post) return response(null, 404);

        return response()->json($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
