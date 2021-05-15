<?php

namespace App\Nova\Dashboards;



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
use Laravel\Nova\Dashboard;

class AdminDashboard extends Dashboard
{
    /**
     * Get the cards for the dashboard.
     *
     * @return array
     */
    public function cards()
    {
        return [

            (new VendorsPerType())->width('1/2'),
            (new ProductsPerCategory())->width('1/2'),
            (new ViewVendors())->width('1/2'),
            (new ViewProducts())->width('1/2'),
            (new ViewPosts())->width('1/2'),
            (new NewUsers)->width('1/2')
                ->help('คำนวณจากจำนวนสมาชิกทั้งหมดรวมทั้งที่ Active และถูกแบนแล้ว'),
            (new NewVendors)->width('1/2')
                ->help('คำนวณจากจำนวนธุรกิจทั้งหมดรวมทั้ง อนุมัติ และไม่อนุมัติ'),
            (new NewProducts)->width('1/2')
                ->help('คำนวณจากจำนวนสินค้าทั้งหมดรวมทั้ง อนุมัติ และไม่อนุมัติ'),
            (new NewPosts)->width('1/2')
                ->help('คำนวณจากจำนวนโพสทั้งหมดรวมทั้ง เผยแพร่ และไม่เผยแพร่'),
            (new UsersPerDay)->width('1/2')
                ->help('คำนวณจากจำนวนสมาชิกทั้งหมดรวมทั้งที่ Active และถูกแบนแล้ว'),
            (new VendorsPerDay)->width('1/2')
                ->help('คำนวณจากจำนวนธุรกิจทั้งหมดรวมทั้ง อนุมัติ และไม่อนุมัติ'),
            (new ProductsPerDay)->width('1/2')
                ->help('คำนวณจากจำนวนสินค้าทั้งหมดรวมทั้ง อนุมัติ และไม่อนุมัติ'),
            (new PostsPerDay)->width('1/2')
                ->help('คำนวณจากจำนวนโพสทั้งหมดรวมทั้ง เผยแพร่ และไม่เผยแพร่'),
        ];
    }

    /**
     * Get the URI key for the dashboard.
     *
     * @return string
     */
    public static function uriKey()
    {
        return 'admin-dashboard';
    }
    public static function label()
    {
        return 'Admin Dashboard';
    }
}
