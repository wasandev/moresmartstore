<?php

namespace App\Policies;

use App\User;
use App\Page;
use Illuminate\Auth\Access\HandlesAuthorization;

class PagePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->role == 'admin' || $user->hasPermissionTo('view pages');
    }

    public function view(User $user, Page $page)
    {
        return $user->role == 'admin' || $user->hasPermissionTo('view pages');
    }


    public function create(User $user)
    {
        return $user->role == 'admin' || $user->hasPermissionTo('create pages');
    }


    public function update(User $user, Page $page)
    {

        return $user->role == 'admin' || $user->hasPermissionTo('edit pages');
    }


    public function delete(User $user, Page $page)
    {
        return $user->role == 'admin' ||  $user->hasPermissionTo('delete pages');
    }
}
