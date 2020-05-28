<?php

namespace App\Nova\Actions;

use Illuminate\Bus\Queueable;
use Anaseqal\NovaImport\Actions\Action;
use Illuminate\Support\Collection;
use Laravel\Nova\Fields\ActionFields;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Laravel\Nova\Fields\File;

use App\Imports\BusinesstypeImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportBusinesstype extends Action
{
    use InteractsWithQueue, Queueable,SerializesModels;

    public $onlyOnIndex = true;
    /**
     * Perform the action on the given models.
     *
     * @param  \Laravel\Nova\Fields\ActionFields  $fields
     * @param  \Illuminate\Support\Collection  $models
     * @return mixed
     */
    public function name() {
		return __('Import Business type');
    }

    /**
     * @return string
     */
    public function uriKey() :string
    {
        return 'import-businesstypes';
    }
    public function handle(ActionFields $fields, Collection $models)
    {
        Excel::import(new BusinesstypeImport, $fields->file);
        return Action::message('It worked!');
    }

    /**
     * Get the fields available on the action.
     *
     * @return array
     */
    public function fields()
    {
        return [
            File::make('File')
            ->rules('required'),
        ];
    }
}
