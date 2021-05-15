<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Trix;
use Metrixinfo\Nova\Fields\Iframe\Iframe;

use Laravel\Nova\Http\Requests\NovaRequest;
use Symfony\Component\VarDumper\Cloner\Data;

class Blog extends Resource
{
    public static $group = "Admin";
    public static $priority = 8;
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Blog::class;
    public static $with = ['user'];

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'title', 'blog_content'
    ];

    /**
     * Get the displayable label of the resource.
     *
     * @return  string
     */
    public static function label()
    {
        return __('Blog');
    }

    /**
     * Get the displayable singular label of the resource.
     *
     * @return string
     */
    public static function singularLabel()
    {
        return __('Blog');
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
            Boolean::make(__('Published'), 'published')
                ->rules('required')
                ->sortable(),
            DateTime::make(__('Published_at'),  'published_at')
                ->sortable(),

            Text::make(__('Visits'), function () {
                return $this->visits($this->id)->count();
            }),
            BelongsTo::make(__('User'), 'user', 'App\Nova\User')
                ->onlyOnDetail(),
            BelongsTo::make(__('Blog_cat'), 'blog_cat', 'App\Nova\Blog_cat')
                ->rules('required')
                ->hideFromIndex()
                ->sortable(),
            Text::make(__('Title'),  'title')
                ->rules('required')
                ->sortable(),

            Trix::make(__('Blog_content'),  'blog_content')
                ->rules('required')
                ->hideFromIndex()
                ->stacked()
                ->alwaysShow()
                ->withFiles('public'),
            Textarea::make('Embed script', 'embed')
                ->onlyOnForms(),
            Iframe::make('HTML Content', 'embed'),
            Image::make(__('Blog_image'),  'blog_image')
                ->hideFromIndex()
                ->maxWidth(600),
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
        return [];
    }
}
