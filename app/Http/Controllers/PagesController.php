<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;

class PagesController extends Controller
{

    // Show a page by slug
    public function show($slug = '',$navtype='about')
    {
        $page = page::whereSlug($slug)->first();

         $pages = page::where('navtype',$navtype)
                ->where('published',1)
                ->orderBy('menuorder','asc')
                ->get();

        return view('pages.show',compact('page','pages'));
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
