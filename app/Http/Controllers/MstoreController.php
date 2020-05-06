<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Businesstype;
use App\Vendor;
use App\Blog;
use App\Post;

class MstoreController extends Controller
{
    public function index()
    {
        $businesstypes = Businesstype::where('active', 1)
        ->orderBy('name', 'asc')
        ->take(6)
        ->get();

        $vendors = Vendor::where('status', 1)
        ->orderBy('created_at', 'desc')
        ->take(4)
        ->get();

        $blogs = Blog::where('published', 1)
        ->orderBy('published_at', 'desc')
        ->take(4)
        ->get();

        $posts = Post::where('published', 1)
        ->orderBy('published_at', 'desc')
        ->take(3)
        ->get();


        return view('welcome',compact('businesstypes','vendors','blogs','posts'));
    }
}
