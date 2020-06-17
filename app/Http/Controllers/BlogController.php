<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
//use Illuminate\Support\Facades\Input;

class BlogController extends Controller
{
    public function index(Request $request)
    {

        $q= $request->input('blog-search');
        $blogs = Blog::where('published','1')
                ->where('title','LIKE','%'.$q.'%')
                ->orWhere('blog_content','LIKE','%'.$q.'%')
                ->orderBy('published_at', 'desc')
                ->paginate(6);

        if(count($blogs) > 0)
            return view('blogs.index',compact('blogs'))->withQuery ( $q );
        else return view ('blogs.index')->withMessage('ไม่พบเนื้อหาที่ต้องการ ลองค้นหาใหม่!');

    }

    public function show($slug)
    {
        $blog = Blog::whereSlug($slug)->first();
        $blog->visits()->seconds(30)->increment(1,false, ['country', 'language']);
        return view('blogs.show', compact('blog'));
    }
}
