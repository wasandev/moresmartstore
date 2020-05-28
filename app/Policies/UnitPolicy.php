<?php

namespace App\Policies;

use App\User;
use App\Unit;
use Illuminate\Auth\Access\HandlesAuthorization;

class UnitPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Unit $unit)
    {
        if ($user->hasPermissionTo('view own units')) {
            return $user->id === $unit->user_id;
        }

        return $user->hasPermissionTo('view units');
    }

    public function create(User $user)
    {

        return $user->hasAnyPermission(['manage units', 'manage own units']);
    }


    public function update(User $user, Unit $unit)
    {
        if ($user->hasPermissionTo('manage own units')) {
            return $user->id == $unit->user_id;
        }
        return $user->hasPermissionTo('manage units');
    }


    public function delete(User $user, Unit $unit)
    {
        if ($user->hasPermissionTo('manage own units')) {
            return $user->id === $unit->user_id;
        }

        return $user->hasPermissionTo('manage units');
    }
}
