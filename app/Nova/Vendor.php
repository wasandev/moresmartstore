<?php

namespace App\Nova;

use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
//use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Panel;
use Illuminate\Http\Request;
use Wasandev\InputThaiAddress\InputSubDistrict;
use Wasandev\InputThaiAddress\InputDistrict;
use Wasandev\InputThaiAddress\InputProvince;
use Wasandev\InputThaiAddress\InputPostalCode;
use Jfeid\NovaGoogleMaps\NovaGoogleMaps;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Textarea;
use Ctessier\NovaAdvancedImageField\AdvancedImage;

class Vendor extends Resource
{
    public static $group = "จัดการข้อมูลธุรกิจ";
    public static $priority = 1;
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Vendor';
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
        'name', 'district', 'province'
    ];
    public static function label()
    {
        return 'ข้อมูลธุรกิจ';
    }
    /*
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
            BelongsTo::make(__('User'), 'user', 'App\Nova\User')
                ->onlyOnDetail(),
            Boolean::make(__('Status'), 'status')
                ->showOnCreating(function ($request) {
                    return $request->user()->role == 'admin';
                    })
                ->sortable()
                ->showOnUpdating(function ($request) {
                    return $request->user()->role == 'admin';
                    }),
            Number::make(__('Visits'), function () {
                    return $this->visits($this->id)->count();
                    }),
            BelongsTo::make(__('Businesstype'), 'businesstype', 'App\Nova\Businesstype')
                ->hideFromIndex(),
            Text::make(__('Vendor Name'), 'name')
                ->sortable()
                ->rules('required'),


            Textarea::make(__('Description'), 'description')
                ->withMeta(['extraAttributes' => [
                    'placeholder' => 'ความยาวต้องไม่ต่ำกว่า 150 ตัวอักษร']
                    ])
                ->alwaysShow()
                ->rules('required','min:150'),
            Text::make(__('Tax ID'), 'taxid')
                ->hideFromIndex(),
            Select::make(__('Business Type'), 'type')->options([
                'company' => 'นิติบุคคล',
                'person' => 'บุคคลธรรมดา'
            ])->displayUsingLabels()
                ->hideFromIndex(),

            new Panel(__('Contact Field'), $this->contactFields()),
            new Panel(__('Address'), $this->addressFields()),
            // Image::make(__('Image'), 'imagefile')
            //     ->hideFromIndex()
            //     ->maxWidth(600),
            AdvancedImage::make(__('Image'),'imagefile')->croppable()->resize(1920)
                    ->hideFromIndex()
                    ->rules("mimes:jpeg,bmp,png","max:2048")
                    ->help('ขนาดไฟล์ไม่เกิน 2 MB.'),

            AdvancedImage::make(__('Logo'), 'logofile')->croppable()->resize(500,500)
                ->hideFromIndex()
                ->rules("mimes:jpeg,bmp,png","max:2048")
                    ->help('ขนาดไฟล์ไม่เกิน 2 MB.'),
            HasMany::make(__('Product'),'products','App\Nova\Product'),
            HasMany::make(__('Post'),'posts','App\Nova\Post'),
        ];
    }
    /**
     * Get the address fields for the resource.
     *
     * @return array
     */
    protected function contactFields()
    {
        return [
            Text::make(__('Contact Name'), 'contractname')
                ->hideFromIndex(),
            Text::make(__('Phone No'), 'phoneno')
                ->rules('required',"numeric","digits_between:9,10")
                ->hideFromIndex(),
            Text::make(__('Website'), 'weburl')
                ->hideFromIndex()
                ->rules('nullable','url')
                ->help('url ของเว็บไซต์ต้องมีรูปแบบดังนี้ http://www.example.com'),
            Text::make(__('Facebook'), 'facebook')
                ->hideFromIndex()
                ->rules('nullable','url')
                ->help('url ของ Facebook ต้องมีรูปแบบดังนี้ https://www.facebook.com/example'),
            Text::make(__('Line'), 'line')
                ->hideFromIndex(),
            Text::make(__('Email'), 'email')
                ->hideFromIndex()
                ->rules('required', 'email:rfc,dns', 'max:255'),

        ];
    }
    /**
     * Get the address fields for the resource.
     *
     * @return array
     */
    protected function addressFields()
    {
        return [

            Text::make(__('Address'), 'address')->hideFromIndex()
                ->rules('required'),
            InputSubDistrict::make(__('Sub District'), 'sub_district')
                ->withValues(['district', 'amphoe', 'province', 'zipcode'])
                ->fromValue('district')
                ->rules('required')
                ->hideFromIndex(),
            InputDistrict::make(__('District'), 'district')
                ->withValues(['district', 'amphoe', 'province', 'zipcode'])
                ->fromValue('amphoe')
                ->rules('required')
                ->sortable(),
            InputProvince::make(__('Province'), 'province')
                ->withValues(['district', 'amphoe', 'province', 'zipcode'])
                ->fromValue('province')
                ->rules('required')
                ->sortable(),
            InputPostalCode::make(__('Postal Code'), 'postal_code')
                ->withValues(['district', 'amphoe', 'province', 'zipcode'])
                ->fromValue('zipcode')
                ->rules('required')
                ->hideFromIndex(),
            NovaGoogleMaps::make(__('Google Map'), 'location')->setValue($this->location_lat, $this->location_lng)
                ->hideFromIndex(),

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
            new Filters\VendorStatus,
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
            (new Actions\SetVendorActive)
                ->confirmText('ต้องการอนุมัติธุรกิจที่เลือก?')
                ->confirmButtonText('อนุมัติ')
                ->cancelButtonText("ยกเลิก")
                ->canSee(function ($request) {
                    return $request->user()->role == 'admin' ;

                }),
            (new Actions\SetVendorInActive)
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
