<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Post extends Model
{
    use Notifiable;
    protected $fillable = [
        'vendor_id',
        'user_id',
        'title',
        'content',
        'post_image',
        'published',
        'published_at'
    ];
    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // public function comments()
    // {
    //     return $this->hasMany('App\Comment');
    // }

    public function Vendor()
    {
        return $this->belongsTo('App\Vendor');
    }

    public function visits()
    {
        return visits($this);
    }
}
