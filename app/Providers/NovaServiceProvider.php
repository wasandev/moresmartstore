<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Cards\Help;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;
use App\Nova\Role;
use Anaseqal\NovaImport\NovaImport;
use App\Nova\Dashboards\MstoreAdmin;
use App\Nova\Metrics\NewUsers;
use App\Nova\Metrics\UsersPerDay;
use App\Nova\Metrics\NewVendors;
use App\Nova\Metrics\VendorsPerDay;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
                ->withAuthenticationRoutes()
                ->withPasswordResetRoutes()
                ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            // return in_array($user->email, [
            //     'wasandev@gmail.com',
            // ]);
            return true;
        });
    }

    /**
     * Get the cards that should be displayed on the default Nova dashboard.
     *
     * @return array
     */
    protected function cards()
    {
        return [
            (new NewUsers)->width('1/3')
                ->help('คำนวณจากจำนวนสมาชิกทั้งหมดรวมทั้งที่ Active และถูกแบนแล้ว'),
            (new UsersPerDay)->width('1/3')
                ->help('คำนวณจากจำนวนสมาชิกทั้งหมดรวมทั้งที่ Active และถูกแบนแล้ว'),
            (new NewVendors)->width('1/3')
                ->help('คำนวณจากจำนวนธุรกิจทั้งหมดรวมทั้ง อนุมัติ และไม่อนุมัติ'),
            (new VendorsPerDay)->width('1/3')
                ->help('คำนวณจากจำนวนธุรกิจทั้งหมดรวมทั้ง อนุมัติ และไม่อนุมัติ'),

        ];
    }

    /**
     * Get the extra dashboards that should be displayed on the Nova dashboard.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [

        ];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [
            \Pktharindu\NovaPermissions\NovaPermissions::make()
            ->roleResource(Role::class),
            new NovaImport,
        ];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    protected function resources()
    {

        Nova::resourcesIn(app_path('Nova'));
        Nova::sortResourcesBy(function ($resource) {
            return $resource::$priority ?? 9999;
            });

    }
}
