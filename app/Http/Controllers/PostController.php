<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;


class PostController extends Controller
{

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
                    ->orWhereHas('vendor',function($query) use($q) {
                        $query->where('name','LIKE','%'.$q.'%')
                              ->orWhere('description','LIKE','%'.$q.'%');
                    })
                    ->orderBy('published_at', 'desc')
                    ->paginate(8);

        if(count($posts) > 0)
            return view('posts.index',compact('posts'))->withQuery ( $q );
        else return view ('posts.index')->withMessage('ไม่พบข้อมูลที่ต้องการ ลองค้นหาใหม่!');


    }
    public function show($id)
    {

        $post = Post::where('id',$id)->firstOrFail();
        $post->visits()->seconds(30)->increment(1,false, ['country', 'language']);

        $postvendors = Post::where('vendor_id', $post->vendor->id)
                            ->where('id','<>',$id)
                            ->where('published',1)
                            ->orderBy('published_at', 'desc')
                            ->paginate(10);

        return view('posts.show', compact('post','postvendors'));
    }


}
