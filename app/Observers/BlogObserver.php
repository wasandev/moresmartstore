<?php

namespace App\Observers;
use App\Blog;

class BlogObserver
{
    public function creating(Blog $blog)
    {
        $blog->user_id = auth()->user()->id;
    }

    public function saving(Blog $blog)
    {
        $blog->user_id = auth()->user()->id;
    }
}
