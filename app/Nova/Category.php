<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Http\Requests\NovaRequest;

class Category extends Resource
{
    public static $group = "Admin";
    public static $priority = 4;
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Category::class;
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
        return 'ประเภทสินค้า/บริการ';
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
            Boolean::make('การเผยแพร่', 'active')
                ->showOnCreating(function ($request) {
                    return $request->user()->role == 'admin';
                    })
                ->showOnUpdating(function ($request) {
                    return $request->user()->role == 'admin';
                    }),
                    Text::make('ประเภทสินค้า/บริการ', 'name')->sortable(),
            BelongsTo::make('ผู้ทำรายการ', 'user', 'App\Nova\User')
                ->onlyOnDetail()
                ->canSee(function ($request) {
                    return $request->user()->role == 'admin';
                    }),

            HasMany::make('สินค้า', 'products', 'App\Nova\Product'),
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
            (new Actions\ImportCategory)
            ->canSee(function ($request) {
                return $request->user()->role == 'admin';
                }),
            (new Actions\SetCategoryActive)
                ->confirmText('ต้องการเผยแพร่รายการที่เลือก?')
                ->confirmButtonText('เผยแพร่')
                ->cancelButtonText("ยกเลิก")
                ->canSee(function ($request) {
                    return $request->user()->role == 'admin' ;

                }),
            (new Actions\SetCategoryInActive)
                ->confirmText('ไม่ต้องการเผยแพร่รายการที่เลือก?')
                ->confirmButtonText('ไม่เผยแพร่')
                ->cancelButtonText("ยกเลิก")
                ->canSee(function ($request) {
                    return $request->user()->role == 'admin' ;
                }),
        ];
    }


}
