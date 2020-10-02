<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Avatar;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Http\Requests\NovaRequest;
use KirschbaumDevelopment\NovaMail\Actions\SendMail;


class User extends Resource
{

    public static $group = "Admin";
    public static $priority = 1;

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\User::class;

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
        'id', 'name', 'email'
    ];

    /**
     * Get the displayble label of the resource.
     *
     * @return string
     */
    public static function label()
    {
        return 'บัญชีผู้ใช้';
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

            Avatar::make('รูปโปรไฟล์', 'avatar')
                ->maxWidth(500),

            Text::make('ชื่อผู้ใช้', 'name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('อีเมล', 'email')
                ->sortable()
                ->rules('required', 'email', 'max:254')
                ->creationRules('unique:users,email')
                ->updateRules('unique:users,email,{{resourceId}}'),

            Password::make('รหัสผ่าน', 'password')
                ->onlyOnForms()
                ->creationRules('required', 'string', 'min:8')
                ->updateRules('nullable', 'string', 'min:8'),
            Text::make('โทรศัพท์', 'mobile'),
            Select::make('สิทธิ์การใช้งาน', 'role')->options([
                'admin' => 'Admin',
                'member' => 'Member',
            ])->displayUsingLabels()
                ->canSee(function ($request) {
                    return $request->user()->role == 'admin';
                }),
            BelongsToMany::make('กำหนดสิทธิ์การใช้งาน', 'roles', \Pktharindu\NovaPermissions\Nova\Role::class)
                ->canSee(function ($request) {
                    return $request->user()->role == 'admin';
                }),
            HasMany::make('รายชื่อธุรกิจ', 'vendors', 'App\Nova\Vendor'),
            //HasMany::make('รายการโพส','posts','App\Nova\Post')
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
            (new SendMail)
                ->canSee(function ($request) {
                    return $request->user()->role == 'admin';
                }),
        ];
    }
    public static function indexQuery(NovaRequest $request, $query)
    {
        if ($request->user()->role == 'member') {
            return $query->where('id', $request->user()->id);
        }
        return $query;
    }
}
