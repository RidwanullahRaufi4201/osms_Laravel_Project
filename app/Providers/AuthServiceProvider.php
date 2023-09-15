<?php

namespace App\Providers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
          Gate::define("isAdmin",function(){
            return auth()->user()->user_role=="admin";
          });
          Gate::define("isUser",function(){
            return auth()->user()->user_role=="user";
          });
          Gate::define("isMechanic",function(){
            return auth()->user()->user_role=="mechanic";
          });
    }
}
