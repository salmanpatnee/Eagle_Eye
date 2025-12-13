<?php

namespace App\Providers;

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
                'pdfUrl' => $updatedUrl
            ]);
        });
    }
}
