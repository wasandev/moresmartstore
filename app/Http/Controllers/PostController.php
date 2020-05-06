<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::where('published', 1)
        ->orderBy('published_at', 'desc')
        ->get();

        return view('posts.index',compact('posts'));

    }
    public function show($slug)
    {
        $post = post::whereSlug($slug)->first();
        return view('posts.show', compact('post'));
    }


}
