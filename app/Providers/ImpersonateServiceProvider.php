<?php

namespace App\Providers;

use App\Classes\Impersonate;
use Illuminate\Support\ServiceProvider;

class ImpersonateServiceProvider extends ServiceProvider
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
        $this->app->singleton('impersonate', function () {
            return $this->app->make(Impersonate::class);
        });
    }
}
