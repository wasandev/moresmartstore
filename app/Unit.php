<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = [
        'name', 'user_id'
    ];

    public function product()
    {
        return $this->belongsTo('App\product');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
