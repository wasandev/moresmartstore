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
        return $user->hasPermissionTo('view units');
    }


    public function create(User $user)
    {
        return $user->hasPermissionTo('create units');
    }


    public function update(User $user, Unit $unit)
    {

        return $user->hasPermissionTo('edit units');
    }


    public function delete(User $user, Unit $unit)
    {
        return $user->hasPermissionTo('delete units');
    }
}
