<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Pktharindu\NovaPermissions\Traits\ValidatesPermissions;
use App\User;
//use KirschbaumDevelopment\NovaMail\Models\NovaMailTemplate;
class AuthServiceProvider extends ServiceProvider
{

    use ValidatesPermissions;
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        'KirschbaumDevelopment\NovaMail\Models\NovaMailTemplate' => 'App\Policies\NovaMailTemplatePolicy',
        'KirschbaumDevelopment\NovaMail\Models\NovaSentMail' => 'App\Policies\NovaSentMailPolicy'
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        foreach (config('nova-permissions.permissions') as $key => $permissions) {
            Gate::define($key, function (User $user) use ($key) {
                if ($this->nobodyHasAccess($key)) {
                    return true;
                }

                return $user->hasPermissionTo($key);
            });
        }

        //
    }
}
