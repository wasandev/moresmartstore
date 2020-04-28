<?php

namespace App\Observers;
use App\Comment;

class CommentObserver
{
    public function creating(Comment $comment)
    {
        $comment->user_id = auth()->user()->id;
    }

    public function saving(Comment $comment)
    {
        $comment->user_id = auth()->user()->id;
    }
}
