<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function show(Post $post, Comment $comment){
        $comments = Comment::where('post_id', $post->id)->orderBy('created_at', 'desc')->get();

        return view('content.single-post', compact('post', 'comments'));
    }

    public function store(Request $request, Post $post)
    {
        $formFields = $request->validate([
            'content' => ['required'],
            'media' => ['image'],
        ]);

        $formFields['user_id'] = auth()->id();
        $formFields['number_of_comments'] =  0;

        // Check if media content is uploaded
        if ($request->hasFile('media')) {
            $user = auth()->user();
            $filename = $user->id . '-' . uniqid() . '.' . $request->file('media')->getClientOriginalExtension();

            // Store the media content
            $request->file('media')->storeAs('public/postImages', $filename);

            // Assign the media content filename to the post
            $formFields['media'] = $filename;
        }

        $post->create($formFields);

        $posts = Post::orderBy('created_at', 'desc')->get();

        return redirect('/')->with('success', 'Post successfully uploaded');
    }

    public function index(){
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('content.home', compact('posts'));
    }


    public function destroy(Post $post){
        if ($post->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }
        $post->delete();
        return back()->with('success', 'post successfully deleted');
    }



    public function like()
    {
        $post = Post::find(request()->id);

        if ($post->isLikedByLoggedInUser()) {
            $res = Like::where([
                'user_id' => auth()->user()->id,
                'post_id' => request()->id
            ])->delete();

            if ($res) {
                return response()->json([
                    'count' => Post::find(request()->id)->likes->count()
                ]);
            }

        } else {
            $like = new Like();

            $like->user_id = auth()->user()->id;
            $like->post_id = request()->id;

            $like->save();

            return response()->json([
                'count' => Post::find(request()->id)->likes->count()
            ]);
        }
    }

    public function followig(){
        $user = auth()->user();
        $followingsIDs = $user->followings()->pluck('user_id');
        $posts = Post::whereIn('user_id', $followingsIDs)->orderBy('created_at', 'desc')->get();
        return view('content.following-feed', compact('posts'));
    }

}
