<?php

namespace App\Observers;
use App\Post;

class PostObserver
{
    public function creating(Post $post)
    {
        $post->user_id = auth()->user()->id;
    }

    public function saving(Post $post)
    {
        $post->user_id = auth()->user()->id;
    }
}
