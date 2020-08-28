<?php

namespace App\Policies;

use App\User;

use Illuminate\Auth\Access\HandlesAuthorization;
use KirschbaumDevelopment\NovaMail\Models\NovaMailTemplate;

class NovaMailTemplatePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->role == 'admin' ;
    }
    public function view(User $user)
    {
        return $user->role == 'admin' ;
    }


    public function create(User $user)
    {
        return $user->role == 'admin' ;
    }


    public function update(User $user)
    {

        return $user->role == 'admin' ;
    }


    public function delete(User $user)
    {
        return $user->role == 'admin' ;
    }
}
