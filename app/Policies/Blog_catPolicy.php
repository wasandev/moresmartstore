<?php

namespace App\Policies;

use App\User;
use App\Blog_cat;
use Illuminate\Auth\Access\HandlesAuthorization;

class Blog_catPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->role == 'admin' || $user->hasPermissionTo('view blog_cats');
    }

    public function view(User $user, Blog_cat $blog_cat)
    {
        return $user->role == 'admin' || $user->hasPermissionTo('view blog_cats');
    }


    public function create(User $user)
    {
        return $user->role == 'admin' || $user->hasPermissionTo('create blog_cats');
    }


    public function update(User $user, Blog_cat $blog_cat)
    {

        return $user->role == 'admin' || $user->hasPermissionTo('edit blog_cats');
    }


    public function delete(User $user, Blog_cat $blog_cat)
    {
        return $user->role == 'admin' ||  $user->hasPermissionTo('delete blog_cats');
    }
}
