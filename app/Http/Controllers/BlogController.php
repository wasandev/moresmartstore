<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('published', 1)
        ->orderBy('published_at', 'desc')
        ->get();

        return view('blogs.index',compact('blogs'));

    }
    public function show($slug)
    {
        $blog = Blog::whereSlug($slug)->first();
        return view('blogs.show', compact('blog'));
    }
}
