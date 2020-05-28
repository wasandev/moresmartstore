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
        if ($user->hasPermissionTo('view own posts')) {
            return $user->id === $post->user_id;
        }

        return $user->hasPermissionTo('view posts');
    }

    public function create(User $user)
    {

        return $user->hasAnyPermission(['manage posts', 'manage own posts']);
    }


    public function update(User $user, Post $post)
    {
        if ($user->hasPermissionTo('manage own posts')) {
            return $user->id == $post->user_id;
        }
        return $user->hasPermissionTo('manage posts');
    }


    public function delete(User $user, Post $post)
    {
        if ($user->hasPermissionTo('manage own posts')) {
            return $user->id === $post->user_id;
        }

        return $user->hasPermissionTo('manage posts');
    }
}
