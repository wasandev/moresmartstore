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
        return $user->hasPermissionTo('view categories');
    }


    public function create(User $user)
    {
        return $user->hasPermissionTo('create categories');
    }


    public function update(User $user, Category $category)
    {

        return $user->hasPermissionTo('edit categories');
    }


    public function delete(User $user, Category $category)
    {
        return $user->hasPermissionTo('delete categories');
    }
}
