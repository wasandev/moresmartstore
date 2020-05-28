<?php

namespace App\Observers;
use App\Product;
class ProductObserver
{
    public function creating(Product $product)
    {
        $product->user_id = auth()->user()->id;
        $product->status = 0 ;
    }


    public function updating(Product $product)
    {
        if(auth()->user()->role != 'admin') {
            $product->status = 0 ;
        }
    }
}
