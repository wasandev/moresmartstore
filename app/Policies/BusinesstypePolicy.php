<?php

namespace App\Policies;

use App\User;
use App\Businesstype;
use Illuminate\Auth\Access\HandlesAuthorization;

class BusinesstypePolicy
{
    use HandlesAuthorization;

    public function view(User $user, Businesstype $businesstype)
    {
        if ($user->hasPermissionTo('view own businesstypes')) {
            return $user->id === $businesstype->user_id;
        }

        return  $user->role == 'admin' || $user->hasPermissionTo('view businesstypes');
    }

    public function create(User $user)
    {

        return $user->role == 'admin' || $user->hasAnyPermission(['manage businesstypes', 'manage own businesstypes']);
    }


    public function update(User $user, Businesstype $businesstype)
    {
        if ($user->hasPermissionTo('manage own businesstypes')) {
            return $user->id == $businesstype->user_id;
        }
        return $user->role == 'admin' || $user->hasPermissionTo('manage businesstypes');
    }


    public function delete(User $user, Businesstype $businesstype)
    {
        if ($user->hasPermissionTo('manage own businesstypes')) {
            return $user->id === $businesstype->user_id;
        }

        return $user->role == 'admin' || $user->hasPermissionTo('manage businesstypes');
    }
}
