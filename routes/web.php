<?php

/*
|------------------------------------------
| Localization
|------------------------------------------
*/
Route::middleware('localizer')->group(function () {
    /*
    |------------------------------------------
    | Website
    |------------------------------------------
    */

    Route::prefix('auth')->namespace('Website')->group(function () {
        Route::get('/', 'HomeController@index');
        Route::get('/contact-us', 'ContactUsController@index');
        Route::post('/contact-us/submit', 'ContactUsController@feedback');
        // gallery
        Route::get('/gallery', 'GalleryController@index');
        Route::get('/gallery/{albumSlug}', 'GalleryController@showAlbum');
        // blog / articles
        Route::get('/blog', 'BlogController@index');
        Route::get('/blog/{articleSlug}', 'BlogController@show');
        // news and events
        Route::get('/news-and-events', 'NewsEventController@index');
        Route::get('/news-and-events/{newsSlug}', 'NewsEventController@show');
    });

    /*
    |------------------------------------------
    | Website Account
    |------------------------------------------
    */
    Route::prefix('account')
        ->namespace('Website')
        ->middleware('auth')
        ->group(function () {
            Route::get('/', 'Account\AccountController@index')->name('account');
            Route::get('/profile', 'Account\ProfileController@index')->name('profile');
            Route::post('/profile', 'Account\ProfileController@update');
        });

    Route::prefix('auth')->namespace('Auth')->group(function () {
        // logout (get or post)
        Route::any('logout', 'LoginController@logout')->name('logout');
        Route::middleware('guest')->group(function () {
            // login
            Route::get('login', 'LoginController@showLoginForm')->name('login');
            Route::post('login', 'LoginController@login');
            // registration
            Route::get('register/{token?}', 'RegisterController@showRegistrationForm')
                ->name('register');
            Route::post('register', 'RegisterController@register');
            Route::get('register/confirm/{token}', 'RegisterController@confirmAccount');
            // password reset
            Route::get('password/forgot', 'ForgotPasswordController@showLinkRequestForm')
                ->name('forgot-password');
            Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail');
            Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')
                ->name('password.reset');
            Route::post('password/reset', 'ResetPasswordController@reset');
        });
    });
    /*
    |--------------------------------------------------------------------------
    | Website Dynamic Pages
    | This must be at the end of the file for the admin page builder
    |--------------------------------------------------------------------------
    */
    Route::namespace('Website')->group(function () {
        Route::get('{slug1}/{slug2?}/{slug3?}', 'PagesController@index');
    });
});
