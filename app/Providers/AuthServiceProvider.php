<?php

namespace App\Providers;

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
        
        // 管理者に許可
         Gate::define('admin', function ($user) {
             return ($user->role == 1);
         });
        // 役職者に許可
         Gate::define('manager', function ($user) {
             return ($user->role >= 2 && $user->role <= 4);
         });

    }
}
