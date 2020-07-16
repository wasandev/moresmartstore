<?php

namespace App\Observers;
use App\Post;
use App\Traits\ThaiSlug;
use App\Notifications\NewPost;
use App\Notifications\NewPostNotification;
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

    public function created(Post $post)
    {
        //Log::stack(['single'])->info('Sending email for new posts to, Admin');
        $post->notify(new NewPostNotification($post));
    }

    public function updated(Post $post)
    {
        if(auth()->user()->role == 'admin' && $post->published == 1) {
            $user = $post->user;
            foreach ($user->followers as $follower) {
                $follower->notify(new NewPost($user, $post));
            }
        }
    }
}
