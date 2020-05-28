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
        if ($user->hasPermissionTo('view own products')) {
            return $user->id === $product->user_id;
        }

        return $user->hasPermissionTo('view products');
    }

    public function create(User $user)
    {

        return $user->hasAnyPermission(['manage products', 'manage own products']);
    }


    public function update(User $user, Product $product)
    {
        if ($user->hasPermissionTo('manage own products')) {
            return $user->id == $product->user_id;
        }
        return $user->hasPermissionTo('manage products');
    }


    public function delete(User $user, Product $product)
    {
        if ($user->hasPermissionTo('manage own products')) {
            return $user->id === $product->user_id;
        }

        return $user->hasPermissionTo('manage products');
    }
}
