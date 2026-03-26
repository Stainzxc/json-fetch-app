<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return Post::with('user', 'comments')->get();

        if ($posts->isEmpty()) {
            return response()->json([
                'message' => 'No posts available'
            ], 200);
        }

        return response()->json($posts);
    }

    public function show(Request $request, $id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json([
                'message' => 'Post not found'
            ], 200);
        }

        $post->update($request->all());

        return response()->json([
            'message' => 'Post updated successfully',
            'data' => $post
        ]);
    }

    public function store(Request $request)
    {
        $post = Post::create($request->all());

        return response()->json($post, 201);
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json([
                'message' => 'Post not found'
            ], 200);
        }

        $post->update($request->all());

        return response()->json([
            'message' => 'Post updated successfully'
        ]);
    }

    public function destroy($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json([
                'message' => 'Post not found'
            ], 200);
        }

        $post->delete();

        return response()->json([
            'message' => 'Post deleted successfully'
        ]);
    }

    public function comments($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return response()->json([
                'message' => 'Comments not found'
            ], 200);
        }

        return $post->comments;
    }
}
