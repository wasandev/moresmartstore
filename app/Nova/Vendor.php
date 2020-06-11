<?php

namespace App\Nova;

use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
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
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Textarea;

class Vendor extends Resource
{
    public static $group = "Classify";
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
            BelongsTo::make('ผู้เพิ่มข้อมูล', 'user', 'App\Nova\User')
                ->onlyOnDetail(),
            Boolean::make('การเผยแพร่', 'status')
                ->showOnCreating(function ($request) {
                    return $request->user()->role == 'admin';
                    })
                ->showOnUpdating(function ($request) {
                    return $request->user()->role == 'admin';
                    }),
            BelongsTo::make('ประเภทธุรกิจ', 'businesstype', 'App\Nova\Businesstype')
                ->hideFromIndex(),

            Text::make('ชื่อธุรกิจ', 'name')
                ->sortable()
                ->rules('required'),
            Image::make('รูปภาพธุรกิจ', 'imagefile')
                ->hideFromIndex(),
            Image::make('โลโก้', 'logofile')->hideFromIndex(),
            Textarea::make('รายละเอียดธุรกิจ', 'description')
                ->withMeta(['extraAttributes' => [
                    'placeholder' => 'ความยาวต้องไม่ต่ำกว่า 500 ตัวอักษร']
                    ])
                ->rules('required','min:500'),
            Text::make('เลขประจำตัวผู้เสียภาษี', 'taxid')
                ->hideFromIndex(),
            Select::make('ประเภท', 'type')->options([
                'company' => 'นิติบุคคล',
                'person' => 'บุคคลธรรมดา'
            ])->displayUsingLabels()
                ->hideFromIndex(),
            new Panel('ข้อมูลการติดต่อ', $this->contactFields()),
            new Panel('ที่อยู่', $this->addressFields()),
            HasMany::make('รายการสินค้า','products','App\Nova\Product'),
            //HasMany::make('รายการโพสโฆษณา','posts','App\Nova\Post'),



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
            Text::make('ชื่อผู้ติดต่อ', 'contractname')
                ->hideFromIndex()
                ->rules('required'),
            Text::make('โทรศัพท์', 'phoneno')
                ->rules('required'),
            Text::make('เว็บไซต์', 'weburl')
                ->hideFromIndex()
                ->rules('nullable','url')
                ->help('url ของเว็บไซต์ต้องมีรูปแบบดังนี้ http://www.example.com'),
            Text::make('Facebook', 'facebook')
                ->hideFromIndex()
                ->rules('nullable','url')
                ->help('url ของ Facebook ต้องมีรูปแบบดังนี้ https://www.facebook.com/example'),
            Text::make('Line ID', 'line')
                ->hideFromIndex(),
            Text::make('Email', 'email')
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

            Text::make('ที่อยู่', 'address')->hideFromIndex()
                ->rules('required'),
            InputSubDistrict::make('ตำบล/แขวง', 'sub_district')
                ->withValues(['district', 'amphoe', 'province', 'zipcode'])
                ->fromValue('district')
                ->rules('required'),
            InputDistrict::make('อำเภอ/เขต', 'district')
                ->withValues(['district', 'amphoe', 'province', 'zipcode'])
                ->fromValue('amphoe')
                ->rules('required'),
            InputProvince::make('จังหวัด', 'province')
                ->withValues(['district', 'amphoe', 'province', 'zipcode'])
                ->fromValue('province')
                ->rules('required'),
            InputPostalCode::make('รหัสไปรษณีย์', 'postal_code')
                ->withValues(['district', 'amphoe', 'province', 'zipcode'])
                ->fromValue('zipcode')
                ->rules('required'),
            NovaGoogleMaps::make('ตำแหน่งที่ตั้งบน Google Map', 'location')->setValue($this->location_lat, $this->location_lng)
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
    public static function indexQuery(NovaRequest $request, $query)
    {
        if ($request->user()->role == 'member') {
            return $query->where('user_id', $request->user()->id);
        }
        return $query;
    }
}
