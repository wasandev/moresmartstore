<?php

namespace App\Observers;
use App\Category;

class CategoryObserver
{
    public function creating(Category $category)
    {
        $category->user_id = auth()->user()->id;
        $category->active = 0 ;
    }
    public function updating(Category $category)
    {
        if(auth()->user()->role != 'admin') {
            $category->status = 0 ;
        }
    }
}
