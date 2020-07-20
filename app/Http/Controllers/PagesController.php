<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;

class PagesController extends Controller
{

    // Show a page by slug
    public function show($slug = '')
    {
        $page = page::whereSlug($slug)->first();

        if (collect($page)->isNotEmpty() ) {
            return view('pages.show')->with('page', $page);
        }
    }
    public function about($navtype = 'about',$slug = 'about-mstore')
    {
        $page = page::whereSlug($slug)->first();

        $pages = page::where('navtype',$navtype)
                ->where('published',1)
                ->orderBy('menuorder','asc')
                ->get();

        return view('pages.about',compact('page','pages'));

    }


}
