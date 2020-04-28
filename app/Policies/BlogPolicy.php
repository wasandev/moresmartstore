<?php

namespace App\Policies;

use App\User;
use App\Blog;

use Illuminate\Auth\Access\HandlesAuthorization;

class BlogPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->role == 'admin' || $user->hasPermissionTo('view blogs');
    }

    public function view(User $user, Blog $blog)
    {
        return $user->role == 'admin' || $user->hasPermissionTo('view blogs');
    }


    public function create(User $user)
    {
        return $user->role == 'admin' || $user->hasPermissionTo('create blogs');
    }


    public function update(User $user, Blog $blog)
    {

        return $user->role == 'admin' || $user->hasPermissionTo('edit blogs');
    }


    public function delete(User $user, Blog $blog)
    {
        return $user->role == 'admin' ||  $user->hasPermissionTo('delete blogs');
    }
}
