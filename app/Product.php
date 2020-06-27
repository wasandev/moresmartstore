<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'status',
        'vendor_id',
        'category_id',
        'name',
        'description',
        'image',
        'price',
        'unit_id',
        'user_id',
        'shopurl'
    ];
    protected $appends = ['path'];

    public function getPathAttribute()
    {
        return url('storage/'.$this->image);
    }
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function unit()
    {
        return $this->belongsTo('App\Unit');
    }
    // public function product_images()
    // {
    //     return $this->hasMany('App\Product_image');
    // }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function vendor()
    {
        return $this->belongsTo('App\Vendor');
    }
    public function visits()
    {
        return visits($this);
    }
}
