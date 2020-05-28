<?php

namespace App\Policies;

use App\User;
use App\Vendor;
use Illuminate\Auth\Access\HandlesAuthorization;

class VendorPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Vendor $vendor)
    {
        if ($user->hasPermissionTo('view own vendors')) {
            return $user->id === $vendor->user_id;
        }

        return $user->hasPermissionTo('view vendors');
    }

    public function create(User $user)
    {

        return $user->hasAnyPermission(['manage vendors', 'manage own vendors']);
    }


    public function update(User $user, Vendor $vendor)
    {
        if ($user->hasPermissionTo('manage own vendors')) {
            return $user->id == $vendor->user_id;
        }
        return $user->hasPermissionTo('manage vendors');
    }


    public function delete(User $user, Vendor $vendor)
    {
        if ($user->hasPermissionTo('manage own vendors')) {
            return $user->id === $vendor->user_id;
        }

        return $user->hasPermissionTo('manage vendors');
    }
}
