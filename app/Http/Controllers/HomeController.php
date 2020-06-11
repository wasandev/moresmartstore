<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Vendor;
use App\Product;
//use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $vendors = Vendor::where('user_id', Auth::id())
        ->orderBy('created_at', 'desc')
        ->get();

        $products = Product::where('user_id', Auth::id())
        ->orderBy('created_at', 'desc')
        ->get();

        // $posts = Post::where('user_id', Auth::id())
        // ->orderBy('published_at', 'desc')
        // ->get();

        return view('members.home',compact('vendors','products'));

    }
}
