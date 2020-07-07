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
use App\Nova\Metrics\NewProducts;
use App\Nova\Metrics\ProductsPerCategory;
use App\Nova\Metrics\ProductsPerDay;
use App\Nova\Metrics\VendorsPerType;
use App\Nova\Metrics\ViewProducts;
use App\Nova\Metrics\ViewVendors;
use App\Nova\Metrics\ViewPosts;
use App\Nova\Metrics\NewPosts;
use App\Nova\Metrics\PostsPerDay;

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
            (new VendorsPerType())->width('1/2'),
            (new ProductsPerCategory())->width('1/2'),
            (new ViewVendors())->width('1/3'),
            (new ViewProducts())->width('1/3'),
            (new ViewPosts())->width('1/3'),
            (new NewUsers)->width('1/3')
                ->help('คำนวณจากจำนวนสมาชิกทั้งหมดรวมทั้งที่ Active และถูกแบนแล้ว'),
            (new NewVendors)->width('1/3')
                ->help('คำนวณจากจำนวนธุรกิจทั้งหมดรวมทั้ง อนุมัติ และไม่อนุมัติ'),
            (new NewProducts)->width('1/3')
                ->help('คำนวณจากจำนวนสินค้าทั้งหมดรวมทั้ง อนุมัติ และไม่อนุมัติ'),
            (new NewPosts)->width('1/3')
                ->help('คำนวณจากจำนวนโพสทั้งหมดรวมทั้ง เผยแพร่ และไม่เผยแพร่'),
            (new UsersPerDay)->width('1/3')
                ->help('คำนวณจากจำนวนสมาชิกทั้งหมดรวมทั้งที่ Active และถูกแบนแล้ว'),
            (new VendorsPerDay)->width('1/3')
                ->help('คำนวณจากจำนวนธุรกิจทั้งหมดรวมทั้ง อนุมัติ และไม่อนุมัติ'),
            (new ProductsPerDay)->width('1/3')
                ->help('คำนวณจากจำนวนสินค้าทั้งหมดรวมทั้ง อนุมัติ และไม่อนุมัติ'),
            (new PostsPerDay)->width('1/3')
                ->help('คำนวณจากจำนวนโพสทั้งหมดรวมทั้ง เผยแพร่ และไม่เผยแพร่'),


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
