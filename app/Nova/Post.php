<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;

class Post extends Resource
{
    public static $displayInNavigation = true;
    public static $group = "จัดการข้อมูลธุรกิจ";
    public static $priority = 5;
    /**
     * The model the resource corresponds to.
     *
     * @var  string
     */
    public static $model = \App\Post::class;
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
        'id', 'title', 'content'
    ];

    /**
     * Get the displayable label of the resource.
     *
     * @return  string
     */
    public static function label()
    {
        return 'โพสโฆษณา';
    }

    /**
     * Get the displayable singular label of the resource.
     *
     * @return  string
     */
    public static function singularLabel()
    {
        return __('โพสโฆษณา');
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
            Boolean::make('เผยแพร่', 'published')
                ->showOnCreating(function ($request) {
                    return $request->user()->role == 'admin';
                    })
                ->showOnUpdating(function ($request) {
                    return $request->user()->role == 'admin';
                    })
                ->sortable(),
            BelongsTo::make('ชื่อธุรกิจ','vendor','App\Nova\Vendor')
                ->rules('required'),
            Text::make('หัวข้อโพส', 'title')
                ->rules('required')
                ->sortable(),
            Trix::make('เนื้อหาโพส',  'content')
                ->rules('required')
                ->hideFromIndex()
                ->sortable(),
            Image::make('รูปภาพ',  'post_image')
                ->hideFromIndex(),
            DateTime::make('วันที่เผยแพร่',  'published_at')
                ->hideFromIndex()
                ->sortable(),
            BelongsTo::make('ผู้ทำรายการ', 'user', 'App\Nova\User')
                   ->canSee(function ($request) {
                    return $request->user()->role == 'admin';
                    }),
            //HasMany::make('ความเห็น', 'comments', 'App\Nova\Comment')
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

    public static function indexQuery(NovaRequest $request, $query)
    {
        if ($request->user()->role == 'member') {
            return $query->where('user_id', $request->user()->id);
        }
        return $query;
    }
}
