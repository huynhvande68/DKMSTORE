<?php

namespace App\Providers;


use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route ;
use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Support\Facades\Gate as Gateas;
use Illuminate\Contracts\Auth\Access\Authorizable;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        // Gateas::before(function ($user, $ability) {
        //    dd('123');
        // });
        app(Gate::class)->before(function(Authorizable $auth , $route){
            if(method_exists($auth, 'hasPermisson')){
                    
                return $auth->hasPermisson($route) ? $auth->hasPermisson($route) : false;
            }
            return false;
        });

    
    }
}
