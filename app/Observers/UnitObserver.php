<?php

namespace App\Observers;
use App\Unit;
class UnitObserver
{
    public function creating(Unit $unit)
    {
        $unit->user_id = auth()->user()->id;
    }


}
