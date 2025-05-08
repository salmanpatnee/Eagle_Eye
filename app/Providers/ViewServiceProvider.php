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

            $currentUrl = request()->fullUrl();

            // Check if the current URL already contains query parameters
            if (strpos($currentUrl, '?') !== false) {
                // If query string exists, append with '&'
                $updatedUrl = $currentUrl . '&pdf=1';
            } else {
                // If no query string exists, append with '?'
                $updatedUrl = $currentUrl . '?pdf=1';
            }


            $view->with([
                'organizationData' => $organizationData,
                'pdfUrl' => $updatedUrl
            ]);
        });
    }
}
