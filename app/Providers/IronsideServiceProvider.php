<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class IronsideServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        // load Views
        $this->loadViewsFrom(resource_path('views/dashboard'), 'DH');
        $this->loadViewsFrom(resource_path('views/website'), 'WS');
        $this->loadViewsFrom(resource_path('views/layouts'), 'LY');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
