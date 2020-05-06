<?php

namespace App\Observers;
use App\Page;

class PageObserver
{


    public function creating(Page $page)
    {
        $page->user_id = auth()->user()->id;
    }

    public function saving(Page $page)
    {
        $page->user_id = auth()->user()->id;

    }


}
