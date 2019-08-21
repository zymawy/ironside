<?php
/**
 * Created by PhpStorm.
 * User: ironside
 * Date: 12/26/18
 * Time: 5:48 PM.
 */

/*
|--------------------------------------------------------------------------
| AJAX ROUTES
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'ajax', 'middleware' => 'web'], function () {
    // logs
    Route::group(['prefix' => 'log'], function () {
    });

    // Banners
    Route::group(['prefix' => 'banners'], function () {
        Route::get('banners/chart', 'BannerController@getChartData');
    });
});
