<?php

namespace App\Providers;

use App\Models\UserRole;
// use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Paginator::useBootstrap();

        // Prevent database queries during migrations/tests
        if (!app()->runningInConsole()) {
            $roles = UserRole::all();
            View::share('roles', $roles);
        }
    }
}
