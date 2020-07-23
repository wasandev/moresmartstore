<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Boolean;

class Businesstype extends Resource
{

    public static $group = "Admin";
    public static $priority = 3;

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Businesstype::class;
    public static $with = ['user'];

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'name',
    ];

    /**
     * Get the displayble label of the resource.
     *
     * @return string
     */
    public static function label()
    {
        return __('Businesstype');
    }
    /**
     * Get the displayable singular label of the resource.
     *
     * @return string
     */
    public static function singularLabel()
    {
        return __('Businesstype');
    }
    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            Boolean::make(__('Active'), 'active')
                ->showOnCreating(function ($request) {
                    return $request->user()->role == 'admin';
                    })
                ->showOnUpdating(function ($request) {
                    return $request->user()->role == 'admin';
                    }),
            Text::make(__('Name'),'name')
                    ->sortable()
                    ->rules('required', 'max:255'),
            Textarea::Make(__('Description'),'description'),
            BelongsTo::make(__('User'), 'user', 'App\Nova\User')
                ->onlyOnDetail()
                ->canSee(function ($request) {
                    return $request->user()->role == 'admin';
                    }),


        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [
            (new Actions\ImportBusinesstype)
            ->canSee(function ($request) {
                return $request->user()->role == 'admin';
                }),

        ];
    }
}
