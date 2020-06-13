<?php

namespace App\Nova\Actions;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;

class SetVendorActive extends Action
{
    use InteractsWithQueue, Queueable;

    public function uriKey()
    {
        return 'Set Vendor Active';
    }
    public function name()
    {
        return __('Set Vendor Active');
    }
    /**
     * Perform the action on the given models.
     *
     * @param  \Laravel\Nova\Fields\ActionFields  $fields
     * @param  \Illuminate\Support\Collection  $models
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $models)
    {
        foreach ($models as $model) {
            if ($model->status) {
                return Action::danger('รายการนี้อนุมัติแล้ว');
            } else {
                $model->status = 1;
            }

            $model->save();
        }
        return Action::message('ดำเนินการสมบูรณ์');
    }

    /**
     * Get the fields available on the action.
     *
     * @return array
     */
    public function fields()
    {
        return [];
    }
}
