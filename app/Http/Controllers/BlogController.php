<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
//use Illuminate\Support\Facades\Input;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        // $blogs = Blog::where('published', 1)
        // ->orderBy('published_at', 'desc')
        // ->paginate(6);

        $q= $request->input('blog-search');

        $blog = Blog::where('title','LIKE','%'.$q.'%')->orWhere('blog_content','LIKE','%'.$q.'%')->paginate(4);
       //dd($blog);

        if(count($blog) > 0)
            return view('blogs.index')->withDetails($blog)->withQuery ( $q );
        else return view ('blogs.index')->withMessage('ไม่พบเนื้อหาที่ต้องการ ลองค้นหาใหม่!');

        //return view('blogs.index',compact('blogs'));

    }

    public function show($slug)
    {
        $blog = Blog::whereSlug($slug)->first();
        $blog->visits()->increment();
        return view('blogs.show', compact('blog'));
    }
}
