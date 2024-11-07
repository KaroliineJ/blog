<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PublicController extends Controller
{
    public function index()
    {
        $posts = Post::withCount('comments', 'likes')->latest()->simplePaginate(16);
        return view('welcome', compact('posts'));
    }

    public function post(Post $post)
    {
        return view('post', compact('post'));
    }

    public function like(Post $post)
    {
        $user = auth()->user();

        // Check if the user has already liked the post
        $like = $user->likes()->where('post_id', $post->id)->first();

        if ($like) {
            // If the like exists, delete it (unlike)
            $like->delete();
        } else {
            // Otherwise, create a new like
            $like = new Like();
            $like->user()->associate($user);
            $like->post()->associate($post);
            $like->save();
        }

        return redirect()->back();
    }

    public function user(User $user){
        $posts = $user->posts()->withCount('comments', 'likes')->latest()->simplePaginate(16);
        return view('user', compact('posts', 'user'));
    }

    public function follow(User $user){
        $followee = auth()->user()->followees()->where('followee_id', $user->id)->first();
        if($followee){
            auth()->user()->followees()->deatach($user);
        } else {
            auth()->user()->followees()->deatach($user);
        }
        return redirect()->back();
        }
    }
