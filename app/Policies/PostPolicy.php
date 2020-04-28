<?php

namespace App\Policies;

use App\User;
use App\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Post $post)
    {
        return $user->role == 'admin' || $user->role == 'member' || $user->hasPermissionTo('view posts');
    }


    public function create(User $user)
    {
        return $user->role == 'admin' || $user->role == 'member' || $user->hasPermissionTo('create posts');
    }


    public function update(User $user, Post $post)
    {

        return $user->role == 'admin' || $user->role == 'member' || $user->hasPermissionTo('edit posts');
    }


    public function delete(User $user, Post $post)
    {
        return $user->role == 'admin' || $user->role == 'member' || $user->hasPermissionTo('delete posts');
    }
}
