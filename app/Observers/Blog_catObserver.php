<?php

namespace App\Observers;
use App\Blog_cat;

class Blog_catObserver
{
    public function creating(Blog_cat $blog_cate)
    {
        $blog_cate->user_id = auth()->user()->id;
    }

    public function saving(Blog_cat $blog_cat)
    {
        $blog_cat->user_id = auth()->user()->id;
    }
}
