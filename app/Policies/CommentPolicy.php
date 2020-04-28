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
        return $user->role == 'admin' || $user->role == 'member' || $user->hasPermissionTo('view comments');
    }

    public function create(User $user)
    {
        return $user->role == 'admin' || $user->role == 'member' || $user->hasPermissionTo('create comments');
    }


    public function update(User $user, Comment $comment)
    {

        return $user->role == 'admin' || $user->role == 'member' || $user->hasPermissionTo('edit comments');
    }


    public function delete(User $user, Comment $comment)
    {
        return $user->role == 'admin' || $user->role == 'member' || $user->hasPermissionTo('delete comments');
    }

}
