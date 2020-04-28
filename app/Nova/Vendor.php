<?php

namespace App\Nova;

use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
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
use Laravel\Nova\Fields\Number;

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
            Boolean::make('ใช้งาน', 'status'),
            Text::make('ชื่อร้านค้า', 'name')
                ->sortable()
                ->rules('required'),
            Text::make('เลขประจำตัวผู้เสียภาษี', 'taxid')
                ->hideFromIndex(),
            Select::make('ประเภท', 'type')->options([
                'company' => 'นิติบุคคล',
                'person' => 'บุคคลธรรมดา'
            ])->displayUsingLabels()
                ->hideFromIndex(),

            BelongsTo::make('ประเภทธุรกิจ', 'businesstype', 'App\Nova\Businesstype')
                ->hideFromIndex(),

            new Panel('ข้อมูลการติดต่อ', $this->contactFields()),
            new Panel('ที่อยู่', $this->addressFields()),
            new Panel('อื่นๆ', $this->otherFields()),


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
                ->hideFromIndex(),
            Text::make('โทรศัพท์', 'phoneno'),
            Text::make('เว็บไซต์', 'weburl')
                ->hideFromIndex(),
            Text::make('Facebook', 'facebook')
                ->hideFromIndex(),
            Text::make('Line', 'line')
                ->hideFromIndex(),
            Text::make('Email', 'email')
                ->hideFromIndex(),

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

            Text::make('ที่อยู่', 'address')->hideFromIndex(),
            InputSubDistrict::make('ตำบล/แขวง', 'sub_district')
                ->withValues(['district', 'amphoe', 'province', 'zipcode'])
                ->fromValue('district'),
            InputDistrict::make('อำเภอ/เขต', 'district')
                ->withValues(['district', 'amphoe', 'province', 'zipcode'])
                ->fromValue('amphoe'),
            InputProvince::make('จังหวัด', 'province')
                ->withValues(['district', 'amphoe', 'province', 'zipcode'])
                ->fromValue('province'),
            InputPostalCode::make('รหัสไปรษณีย์', 'postal_code')
                ->withValues(['district', 'amphoe', 'province', 'zipcode'])
                ->fromValue('zipcode'),

            NovaGoogleMaps::make('ตำแหน่งที่ตั้งบน Google Map', 'location')->setValue($this->location_lat, $this->location_lng)
                ->hideFromIndex(),

        ];
    }

    /**
     * Get the address fields for the resource.
     *
     * @return array
     */
    protected function otherFields()
    {
        return [
            Image::make('โลโก้', 'logofile'),
            Image::make('ภาพหน้าร้าน', 'imagefile')
                ->hideFromIndex(),
            Textarea::make('รายละเอียดอื่นๆ', 'description')->hideFromIndex(),
            BelongsTo::make('ผู้ทำรายการ', 'user', 'App\Nova\User')
                ->onlyOnDetail(),
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
