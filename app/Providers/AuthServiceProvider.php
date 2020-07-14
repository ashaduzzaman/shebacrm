<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        $gate->define('super_admin-access', function($user){
            return $user->role == 'super_admin';
        });

        $gate->define('sheba_admin-access', function($user){
            return $user->role == 'sheba_admin' || $user->role == 'super_admin';
        });

        $gate->define('agent-access', function($user){
            return $user->role == 'agent';
        });

        $gate->define('user-access', function($user){
            return $user->role == 'user' || $user->role == 'agent' || $user->role == 'sheba_admin' || $user->role == 'super_admin';
        });
    }
}
