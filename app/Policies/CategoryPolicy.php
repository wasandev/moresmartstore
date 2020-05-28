<?php

namespace App\Policies;

use App\User;
use App\Category;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;


    public function view(User $user, Category $category)
    {
        if ($user->hasPermissionTo('view own categories')) {
            return $user->id === $category->user_id;
        }

        return $user->hasPermissionTo('view categories');
    }

    public function create(User $user)
    {

        return $user->hasAnyPermission(['manage categories', 'manage own categories']);
    }


    public function update(User $user, Category $category)
    {
        if ($user->hasPermissionTo('manage own categories')) {
            return $user->id == $category->user_id;
        }
        return $user->hasPermissionTo('manage categories');
    }


    public function delete(User $user, Category $category)
    {
        if ($user->hasPermissionTo('manage own categories')) {
            return $user->id === $category->user_id;
        }

        return $user->hasPermissionTo('manage categories');
    }
}
