<?php

namespace App\Providers;

use App\Models\Farmer;
use App\Models\Team;
use App\Policies\TeamPolicy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Team::class => TeamPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('confirmedFarmer', function () {
            return Auth::user()->farmer->confirmed_at === null;
        });

        Gate::define('admin', function (){
            return Auth::user()->user_type == "admin";
        });

        Gate::define('isFarmer',function (){
            return Auth::user()->user_type == "farmer";
        });
        Gate::define('isCustomer',function (){
            return Auth::user()->user_type == "customer";
        });
    }
}
