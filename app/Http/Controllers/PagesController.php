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

        //collect([])->isNotEmpty();
        if (collect($page)->isNotEmpty() ) {
            return view('pages.index')->with('page', $page);
        }
      }

}
