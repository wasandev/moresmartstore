<?php

namespace App\Observers;
use App\Blog;

use App\Traits\ThaiSlug;

class BlogObserver
{
    use ThaiSlug;

    public function creating(Blog $blog)
    {
        $blog->user_id = auth()->user()->id;


    }

    public function saving(Blog $blog)
    {
        $blog->user_id = auth()->user()->id;
        $blog->slug = $this->convertToSlug($blog->title);

    }




}
