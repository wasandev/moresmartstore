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

        $businesstypes = Businesstype::withCount(['vendors' => function ($query) {
            $query->where('status', 1);
        }])
            ->where('active', 1)
            ->orderBy('vendors_count', 'desc')
            ->take(4)
            ->get();

        $vendors = Vendor::where('status', 1)
            ->whereHas('businesstype', function ($query) {
                $query->where('active', 1);
            })
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        $products = Product::where('status', 1)
            ->whereHas('category', function ($query) {
                $query->where('active', 1);
            })
            ->whereHas('vendor', function ($query) {
                $query->where('status', 1);
            })
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();

        $posts = Post::where('published', 1)
            ->whereHas('vendor', function ($query) {
                $query->where('status', 1);
            })
            ->orderBy('published_at', 'desc')
            ->take(4)
            ->get();

        $blogs = Blog::where('published', 1)
            ->orderBy('published_at', 'desc')
            ->take(4)
            ->get();

        return view('welcome', compact('businesstypes', 'vendors', 'blogs', 'products', 'posts'));
    }
}
