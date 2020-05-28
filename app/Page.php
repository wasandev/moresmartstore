<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'slug',
        'user_id',
        'title',
        'page_content',
        'page_image',
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

    public function visits()
    {
        return visits($this);
    }

}
