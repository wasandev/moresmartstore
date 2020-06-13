<?php

namespace App\Nova\Dashboards;

use Laravel\Nova\Dashboard;
use App\Nova\Metrics\NewUsers;

class MstoreAdmin extends Dashboard
{
    public static function label()
    {
        return 'Admin Dashboard';
    }
    /**
     * Get the cards for the dashboard.
     *
     * @return array
     */
    public function cards()
    {
        return [
            new NewUsers,
        ];
    }

    /**
     * Get the URI key for the dashboard.
     *
     * @return string
     */
    public static function uriKey()
    {
        return 'mstore-admin';
    }
}
