<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Trix;

class Page extends Resource
{

    public static $group = "Admin";
    public static $priority = 6;
    /**
     * The model the resource corresponds to.
     *
     * @var  string
     */
    public static $model = \App\Page::class;
    public static $with = ['user'];


    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var  string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var  array
     */
    public static $search = [
        'id', 'title', 'page_content'
    ];

    /**
     * Get the displayable label of the resource.
     *
     * @return  string
     */
    public static function label()
    {
        return 'เว็บเพจ';
    }

    /**
     * Get the displayable singular label of the resource.
     *
     * @return  string
     */
    public static function singularLabel()
    {
        return 'เว็บเพจ';
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  array
     */
    public function fields(Request $request)
    {
        return [
            ID::make(__('Id'),  'id')
                ->rules('required')
                ->sortable(),
            Boolean::make('การเผยแพร่', 'published')
                ->rules('required')
                ->sortable(),
            Text::make(__('Slug'),  'slug')
                ->rules('required')
                ->sortable(),
            Text::make(__('Title'),  'title')
                ->rules('required')
                ->sortable(),
            Trix::make(__('Content'),  'page_content')
                ->rules('required')
                ->hideFromIndex()
                ->sortable(),
            Image::make(__('Image'),  'page_image')
                ->hideFromIndex()
                ->sortable(),

            DateTime::make(__('Published At'),  'published_at')
                ->hideFromIndex()
                ->sortable(),

        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
