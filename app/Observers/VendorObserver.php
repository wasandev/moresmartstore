<?php

namespace App\Observers;
use App\Vendor;
use App\Notifications\NewVendorNotification;
use App\Notifications\UpdateVendorNotification;
use App\Notifications\ActiveVendorNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Log;

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
            //Log::stack(['single'])->info('Sending email for update vendors to, Admin');
            $vendor->notify(new UpdateVendorNotification($vendor));
        }
    }

    public function created(Vendor $vendor)
    {
        //Log::stack(['single'])->info('Sending email for new vendors to, Admin');
        $vendor->notify(new NewVendorNotification($vendor));
    }

    public function updated(Vendor $vendor)
    {
        if(auth()->user()->role == 'admin' && $vendor->status == 1) {
            //Log::stack(['single'])->info('Sending email to user for active vendors ');
            $vendor->notify(new ActiveVendorNotification($vendor));
        }
    }

}
