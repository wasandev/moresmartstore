<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
//use Illuminate\Support\Facades\Input;

class BlogController extends Controller
{
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    public function index(Request $request)
    {

        $q = $request->input('blog-search');
        $blogs = Blog::where('published', 1)
            ->where(function ($query) use ($q) {
                $query->where('title', 'LIKE', '%' . $q . '%')
                    ->orWhere('blog_content', 'LIKE', '%' . $q . '%');
            })
            ->orderBy('published_at', 'desc')
            ->paginate(12);

        if (count($blogs) > 0)
            return view('blogs.index', compact('blogs'))->withQuery($q);
        else return view('blogs.index')->withMessage('ไม่พบเนื้อหาที่ต้องการ ลองค้นหาใหม่!');
    }

    public function show($slug)
    {
        $blog = Blog::whereSlug($slug)->first();
        $blog->visits()->seconds(30)->increment(1, false, ['country', 'language']);
        $blogs = Blog::where('slug', '<>', $slug)
            ->where('published', 1)
            ->orderBy('published_at', 'desc')
            ->paginate(4);


        return view('blogs.show', [
            'blog' => $blog,
            'blogs' => $blogs,
            'open_graph' => [
                'title' => $blog->title,
                'image' => url(Storage::url($blog->blog_image)),
                'url' => $this->request->url(),
                'description' => strip_tags(Str::of($blog->blog_content)->limit(150))
            ]
        ]);
    }
}
