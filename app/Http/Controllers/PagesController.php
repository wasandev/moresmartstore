<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PagesController extends Controller
{
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    // Show a page by slug
    public function show($slug = '',$navtype='about')
    {
        $page = page::whereSlug($slug)->first();

         $pages = page::where('navtype',$navtype)
                ->where('published',1)
                ->orderBy('menuorder','asc')
                ->get();

        return view('pages.show',[
                    'page'=>$page,
                    'pages'=>$pages,
                    'open_graph' => [
                        'title' => $page->title,
                        'image' => url(Storage::url($page->page_image)),
                        'url' => $this->request->url(),
                        'description' => e(Str::of( $page->page_content)->limit(150))
                        ]
                    ]);
    }
    public function about($navtype = 'about',$slug = 'about-mstore')
    {
        $page = page::whereSlug($slug)->first();

        $pages = page::where('navtype',$navtype)
                ->where('published',1)
                ->orderBy('menuorder','asc')
                ->get();

        return view('pages.about',[
            'page'=>$page,
            'pages'=>$pages,
            'open_graph' => [
                'title' => $page->title,
                'image' => url(Storage::url($page->page_image)),
                'url' => $this->request->url(),
                //'description' => Str::of( $page->page_content)->limit(150)
                'description' => e(Str::of( $page->page_content)->limit(150))
                ]
            ]);

    }


}
