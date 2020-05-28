<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Businesstype;
use App\Vendor;
use App\Blog;
use App\Post;
use App\Product;

class MstoreController extends Controller
{
    public function index()
    {

        $businesstypes = Businesstype::withCount('vendors')->orderBy('vendors_count','desc')
        ->take(8)
        ->get();

        $vendors = Vendor::where('status', 1)
        ->orderBy('created_at', 'desc')
        ->take(3)
        ->get();

        $products = Product::where('status', 1)
        ->orderBy('created_at', 'desc')
        ->take(6)
        ->get();

        $posts = Post::where('published', 1)
        ->orderBy('published_at', 'desc')
        ->take(4)
        ->get();

        $blogs = Blog::where('published', 1)
        ->orderBy('published_at', 'desc')
        ->take(4)
        ->get();

        return view('welcome',compact('businesstypes','vendors','blogs','posts','products'));
    }
}
