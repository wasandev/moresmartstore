<?php

namespace App\Observers;
use App\Post;
use App\Traits\ThaiSlug;
class PostObserver
{
    use ThaiSlug;

    public function creating(Post $post)
    {
        $post->user_id = auth()->user()->id;
    }

    public function saving(Post $post)
    {

        $post->slug = $this->convertToSlug($post->title);
    }

    public function updating(Post $post)
    {
        if(auth()->user()->role != 'admin') {
            $post->published = 0 ;
        }
    }
}
