<?php

namespace App\Providers;

use App\Models\Organization;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Share with all views
        View::composer('*', function ($view) {
            $organizationData = Organization::first(); // or whatever you need
            $view->with('organizationData', $organizationData);
        });
    }
}
