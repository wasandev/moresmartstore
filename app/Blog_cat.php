<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog_cat extends Model
{
    protected $fillable = [
        'name', 'user_id'

    ];

    public function blogs()
    {
        return $this->hasMany('App\Blog');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
