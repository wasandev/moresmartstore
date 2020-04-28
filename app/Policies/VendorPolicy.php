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
        return $user->role == 'admin' || $user->role == 'member' || $user->hasPermissionTo('view vendors');
    }


    public function create(User $user)
    {
        return $user->role == 'admin' || $user->role == 'member' || $user->hasPermissionTo('create vendors');
    }


    public function update(User $user, Vendor $vendor)
    {

        return  $user->role == 'admin' || $user->role == 'member' || $user->hasPermissionTo('edit vendors');
    }


    public function delete(User $user, Vendor $vendor)
    {
        return $user->role == 'admin' || $user->role == 'member' || $user->hasPermissionTo('delete vendors');
    }
}
