<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{

    protected $fillable = [
        'slug',
        'blog_cat_id',
        'user_id',
        'title',
        'blog_content',
        'blog_image',
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
    public function blog_cat()
    {
        return $this->belongsTo('App\Blog_cat');
    }



}
