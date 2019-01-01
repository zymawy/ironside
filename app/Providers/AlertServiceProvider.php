<?php

namespace App\Providers;

use App\Classes\Alert;
use Illuminate\Support\ServiceProvider;

class AlertServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // singleton
        $this->app->singleton('alert', function () {
            return $this->app->make(Alert::class);
        });
    }
}
