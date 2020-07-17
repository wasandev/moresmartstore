<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Image;

//use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;




class Product extends Resource
{
    //public static $displayInNavigation = false;
    public static $group = "จัดการข้อมูลธุรกิจ";
    public static $priority = 2;

    //public static $displayInNavigation = false;
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Product';
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
        'name'
    ];
    public static function label()
    {
        return 'ข้อมูลสินค้า';
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

            Boolean::make('การเผยแพร่', 'status')
                ->showOnCreating(function ($request) {
                    return $request->user()->role == 'admin';
                    })
                ->showOnUpdating(function ($request) {
                    return $request->user()->role == 'admin';
                    }),
            Number::make('การดู(ครั้ง)', function () {
                        return $this->visits($this->id)->count();
                        }),
            BelongsTo::make('ชื่อธุรกิจ','vendor','App\Nova\Vendor')
                    ->rules('required'),
            BelongsTo::make('ประเภทสินค้า', 'category', 'App\Nova\Category')
                ->sortable()
                ->showCreateRelationButton(),
            Text::make('ชื่อสินค้า', 'name')
                ->sortable()
                ->rules('required'),
            Textarea::make('รายละเอียด', 'description')
                ->rules('required')
                ->alwaysShow()
                ->hideFromIndex(),
            Image::make('รูปสินค้า','image')
                ->disk('public')
                ->maxWidth(200)
                ->hideFromIndex(),
            Number::make('ราคาขาย','price'),

            BelongsTo::make('หน่วยนับ', 'unit', 'App\Nova\Unit')
                ->showCreateRelationButton()
                ->nullable(),
            Text::make('ลิงก์สำหรับสั่งซื้อออนไลน์', 'shopurl')
                ->hideFromIndex()
                ->rules('nullable','url')
                ->help('url ของลิงก์ต้องมีรูปแบบดังนี้ http://www.example.com/xyz..'),
            BelongsTo::make('ผู้ทำรายการ', 'user', 'App\Nova\User')
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
        return [
            new Filters\ProductStatus,
        ];
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
            // (new Actions\AddProductServicePrice)->showOnTableRow(),
            // //new Actions\AddProductCustomerPrice,
            // new DownloadExcel,
            (new Actions\SetProductActive)
                ->confirmText('ต้องการอนุมัติธุรกิจที่เลือก?')
                ->confirmButtonText('อนุมัติ')
                ->cancelButtonText("ยกเลิก")
                ->canSee(function ($request) {
                    return $request->user()->role == 'admin' ;

                }),
            (new Actions\SetProductInActive)
                ->confirmText('ไม่อนุมัติธุรกิจที่เลือก?')
                ->confirmButtonText('ไม่อนุมัติ')
                ->cancelButtonText("ยกเลิก")
                ->canSee(function ($request) {
                    return $request->user()->role == 'admin' ;
                }),

        ];
    }
    public static function indexQuery(NovaRequest $request, $query)
    {
        if ($request->user()->role == 'member') {
            return $query->where('user_id', $request->user()->id);
        }
        return $query;
    }
}
