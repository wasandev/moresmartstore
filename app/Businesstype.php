<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Businesstype extends Model
{
    protected $fillable = [
        'name', 'active','description'
    ];

    public function vendors()
    {
        return $this->hasMany('App\Vendor');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
