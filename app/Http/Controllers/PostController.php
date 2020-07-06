<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    public function index(Request $request)
    {

        $q= $request->input('post-search');
        $posts = Post::where('published',1)
                    ->whereHas('vendor',function ($query){
                        $query->where('status',1);
                    })
                    ->where( function($query) use($q) {
                        $query->where('title','LIKE','%'.$q.'%')
                              ->orWhere('content','LIKE','%'.$q.'%');
                    })
                    ->WhereHas('vendor',function($query) use($q) {
                        $query->where('name','LIKE','%'.$q.'%')
                              ->orWhere('description','LIKE','%'.$q.'%');
                    })
                    ->orderBy('published_at', 'desc')
                    ->paginate(6);

        if(count($posts) > 0)
            return view('posts.index',compact('posts'))->withQuery ( $q );
        else return view ('posts.index')->withMessage('ไม่พบข้อมูลที่ต้องการ ลองค้นหาใหม่!');


    }
    public function show($id)
    {

        $post = Post::where('id',$id)->firstOrFail();
        $post->visits()->seconds(30)->increment(1,false, ['country', 'language']);

        $posts = Post::where('id','<>',$id)
                            ->where('published',1)
                            ->orderBy('published_at', 'desc')
                            ->paginate(4);


        return view('posts.show',[
            'post' => $post,
            'posts' => $posts,
            'open_graph' => [
                'title' => $post->title,
                'image' => url(Storage::url($post->image)),
                'url' => $this->request->url(),
                'description' => Str::of( $post->content)->limit(150)
                ]
            ]);
    }


}
