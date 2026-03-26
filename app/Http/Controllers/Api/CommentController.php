<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('postId')) {
            return Comment::where('post_id', $request->postId)->get();
        }

        return Comment::all();
    }
}
