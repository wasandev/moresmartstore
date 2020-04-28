<?php

namespace App\Policies;

use App\User;
use App\Product;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Product $product)
    {
        return $user->role == 'admin' || $user->role == 'member' || $user->hasPermissionTo('view products');
    }


    public function create(User $user)
    {
        return $user->role == 'admin' || $user->role == 'member' || $user->hasPermissionTo('create products');
    }


    public function update(User $user, Product $product)
    {

        return $user->role == 'admin' || $user->role == 'member' || $user->hasPermissionTo('edit products');
    }


    public function delete(User $user, Product $product)
    {
        return $user->role == 'admin' || $user->role == 'member' || $user->hasPermissionTo('delete products');
    }
}
