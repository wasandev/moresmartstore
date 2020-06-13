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

use Laravel\Nova\Http\Requests\NovaRequest;

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
        'id','title','blog_content'
    ];

    /**
     * Get the displayable label of the resource.
     *
     * @return  string
     */
    public static function label()
    {
        return 'บทความเว็บ';
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
            Boolean::make('เผยแพร่', 'published')
                ->rules('required')
                ->sortable(),
            BelongsTo::make('ผู้ทำรายการ', 'user', 'App\Nova\User')
                ->onlyOnDetail(),
            BelongsTo::make('หมวดบทความ','blog_cat','App\Nova\Blog_cat')
                ->rules('required')
                ->sortable(),
            Text::make('เรื่อง',  'title')
                ->rules('required')
                ->sortable(),

            Textarea::make('บทความ',  'blog_content')
                ->rules('required')
                ->hideFromIndex()
                ->stacked()
                ->alwaysShow(),
            Image::make('รูปภาพ',  'blog_image')
                ->hideFromIndex()
                ->sortable(),

            DateTime::make('วันที่เผยแพร',  'published_at')
                ->hideFromIndex()
                ->sortable(),
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
