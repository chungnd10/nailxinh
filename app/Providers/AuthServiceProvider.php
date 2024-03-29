<?php

namespace App\Providers;

use Config;
use App\Permission;
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
        'App\Model' => 'App\Policies\ModelPolicy',
        \App\User::class => \App\Policies\UserPolicy::class,
        \App\Bill::class => \App\Policies\BillPolicy::class,
        \App\Order::class => \App\Policies\OrderPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function ($user) {
            $role_admin = config('contants.role_admin');
            if ($user->role_id == $role_admin) {
                return true;
            }
        });

        if (!$this->app->runningInConsole()) {
            foreach (Permission::all() as $permission) {
                Gate::define($permission->name, function ($user) use ($permission) {
                    return $user->hasPermission($permission);
                });
            }
        }
    }
}
