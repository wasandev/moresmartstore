<?php

namespace App\Policies;

use App\User;
use App\Comment;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Comment $comment)
    {
        if ($user->hasPermissionTo('view own comments')) {
            return $user->id === $comment->user_id;
        }

        return $user->hasPermissionTo('view comments');
    }

    public function create(User $user)
    {

        return $user->hasAnyPermission(['manage comments', 'manage own comments']);
    }


    public function update(User $user, Comment $comment)
    {
        if ($user->hasPermissionTo('manage own comments')) {
            return $user->id == $comment->user_id;
        }
        return $user->hasPermissionTo('manage comments');
    }


    public function delete(User $user, Comment $comment)
    {
        if ($user->hasPermissionTo('manage own comments')) {
            return $user->id === $comment->user_id;
        }

        return $user->hasPermissionTo('manage comments');
    }

}
