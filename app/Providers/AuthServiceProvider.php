<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
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

        Gate::define('manage-initial-setup', function ($user) {
            return in_array($user->role->role_name, ['Admin']);
        });

        Gate::define('manage-asset', function ($user) {
            return in_array($user->role->role_name, ['Admin', 'Manager', 'Operator']);
        });

        Gate::define('add-data', function ($user) {
            return in_array($user->role->role_name, ['Admin', 'Manager']);
        });

        Gate::define('delete-data', function ($user) {
            return in_array($user->role->role_name, ['Admin', 'Manager']);
        });

        //
    }
}
