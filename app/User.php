<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Pktharindu\NovaPermissions\Traits\HasRoles;
use Overtrue\LaravelFollow\Followable;
use Lexx\ChatMessenger\Traits\Messagable;
use KirschbaumDevelopment\NovaMail\Traits\Mailable;


class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable,HasRoles,Followable,Messagable,Mailable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role',  'avatar', 'mobile'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dates = ['logged_in_at', 'logged_out_at'];

    public function roles()
    {
        return $this->belongsToMany('App\Role', 'role_user', 'user_id', 'role_id');
    }
    public function assignRole(Role $role)
    {
        return $this->roles()->save($role);
    }
    public function vendors()
    {
        return $this->hasMany('App\Vendor');
    }

     /**
     * Get the name of the email field for the model.
     *
     * @return string
     */
    public function getEmailField(): string
    {
        return 'email';
    }

    // public function posts()
    // {
    //     return $this->hasMany('App\Post');
    // }

    // public function followers()
    // {
    //     return $this->belongsToMany(self::class, 'followers', 'follows_id', 'user_id')
    //                 ->withTimestamps();


    // }

    // public function follows()
    // {
    //     return $this->belongsToMany(self::class, 'followers', 'user_id', 'follows_id')
    //                 ->withTimestamps();
    // }

    // public function follow($userId)
    // {
    //     $this->follows()->attach($userId);
    //     return $this;
    // }

    // public function unfollow($userId)
    // {
    //     $this->follows()->detach($userId);
    //     return $this;
    // }

    // public function isFollowing($userId)
    // {
    //     return (boolean) $this->follows()->where('follows_id', $userId)->first();
    // }
}
