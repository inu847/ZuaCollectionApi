<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('dasboard', function($user){
            return count(array_intersect(["ADMIN", "MEMBER"], [$user->roles]));
        });

        Gate::define('manage-order', function($user){
            return count(array_intersect(["ADMIN", "MEMBER"], [$user->roles]));
        });

        Gate::define('user', function($user){
            return count(array_intersect([$user->email] , ['adin72978@gmail.com']));
        });

        Gate::define('create-product', function($user){
            return count(array_intersect(["ADMIN", "MEMBER"], [$user->roles]));
        });

        Gate::define('order', function($user){
            return count(array_intersect(["ADMIN", "MEMBER", "CUSTOMER"], [$user->roles]));
        });
        
    }
}
