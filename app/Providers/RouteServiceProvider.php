<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {

        $this->mapDashboardRoutes();

        $this->mapWebsiteRoutes();

        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapAjaxRoutes();

    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }


    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebsiteRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace . '\Website')
            ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace . '\Api')
             ->group(base_path('routes/api.php'));
    }

    /**
     * Define the "datatable" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapDatatableRoutes()
    {
        Route::prefix('datatable')
            ->middleware('web')
            ->namespace($this->namespace . '\Datatable')
            ->as('datatable.')
            ->group(base_path('routes/datatable.php'));
    }


    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapDashboardRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace .'\Dashboard')
            ->as('dashboard.')
            ->group(base_path('routes/dashboard.php'));
    }


    /**
     * Define the "Ajax" routes for the application.
     *
     * @return void
     */
    protected function mapAjaxRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace .'\Ajax')
            ->as('ajax.')
            ->group(base_path('routes/ajax.php'));
    }



}
