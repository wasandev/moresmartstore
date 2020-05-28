<?php

namespace App\Observers;
use App\Vendor;

class VendorObserver
{
    public function creating(Vendor $vendor)
    {
        $vendor->user_id = auth()->user()->id;
        $vendor->status = 0 ;
    }



    public function updating(Vendor $vendor)
    {
        if(auth()->user()->role != 'admin') {
            $vendor->status = 0 ;
        }
    }
}
