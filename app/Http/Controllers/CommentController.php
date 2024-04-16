<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $comment = $request->validate([
            'comment' => 'required',
        ]);

        $comment['user_id'] = auth()->id();
        $comment['post_id'] = $post->id;

        Comment::create($comment);

        return redirect()->route('posts.show', $post->id)->with('success', "Comment posted successfully!");
    }
}
