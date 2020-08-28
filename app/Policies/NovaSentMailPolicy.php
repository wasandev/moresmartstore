<?php

namespace App\Policies;

use App\User;

use Illuminate\Auth\Access\HandlesAuthorization;
use KirschbaumDevelopment\NovaMail\Models\NovaSentMail;

class NovaSentMailPolicy
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
        return false ;
    }


    public function update(User $user)
    {

        return false ;
    }


    public function delete(User $user)
    {
        return $user->role == 'admin' ;
    }
}
