<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Businesstype extends Model
{
    protected $fillable = [
        'name', 'user_id'
    ];

    public function customers()
    {
        return $this->hasMany('App\Vendor');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
