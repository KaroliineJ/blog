<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PublicController extends Controller
{
    public function index(){
        
        $posts = Post::simplePaginate(16);
        return view('welcome', compact('posts'));
    }

    public function post(Post $Post){
        // $id = request()->input('id');
        // $post = $id;
        // if(!$post){
        //     throw new NotFoundHttpException();
        // }
        return view('post', compact('post'));
    }
}
