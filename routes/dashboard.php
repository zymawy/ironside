<?php
/**
 * Created by PhpStorm.
 * User: ironside
 * Date: 12/26/18
 * Time: 5:25 AM
 */


Route::middleware('localizer')->group(function () {
    /*
    |------------------------------------------
    | Dashboard (when authorized and admin)
    |------------------------------------------
    */

    Route::prefix('dashboard')->middleware('auth')->group(function () {
        Route::get('/', 'DashboardController@index')->name('admin');
        // profile
        Route::get('/profile', 'ProfileController@index');
        Route::put('/profile/{user}', 'ProfileController@update');

        // analytics
        Route::group(['prefix' => 'analytics'], function () {
            Route::get('/', 'AnalyticsController@summary');
            Route::get('/devices', 'AnalyticsController@devices');
            Route::get('/visits-and-referrals', 'AnalyticsController@visitsReferrals');
            Route::get('/interests', 'AnalyticsController@interests');
            Route::get('/demographics', 'AnalyticsController@demographics');
        });

        // history
        Route::prefix('latest-activity')->namespace('History')->group(function () {
            Route::get('/', 'HistoryController@website');
            Route::get('/dashboard', 'HistoryController@admin');
            Route::get('/website', 'HistoryController@website');
        });

        // general
        Route::prefix('general')->namespace('General')->group(function () {
            Route::resource('tags', 'TagsController');

            Route::get('/banners/order', 'BannersOrderController@index');
            Route::post('/banners/order', 'BannersOrderController@update');
            Route::resource('banners', 'BannersController');
            Route::post('banners/chart', 'BannersController@getChartData');
        });

        // pages order
        Route::prefix('pages')->namespace('Pages')->group(function () {
            Route::get('/order/{type?}', 'OrderController@index');
            Route::post('/order/{type?}', 'OrderController@updateOrder');

            // manage page sections list order
            Route::get('/{page}/sections', 'PageContentController@index');
            Route::post('/{page}/sections/order', 'PageContentController@updateOrder');
            Route::delete('/{page}/sections/{section}', 'PageContentController@destroy');

            // page components
            Route::resource('/{page}/sections/content', 'PageContentController');
        });
        Route::resource('pages', 'Pages\PagesController');

        // blog
        Route::prefix('blog')->namespace('Blog')->group(function () {
            Route::get('/', function () {
                return redirect('/dashboard/blog/articles');
            });
            Route::resource('categories', 'CategoriesController');
            Route::resource('articles', 'ArticlesController');
        });

        // news and events
        Route::namespace('NewsEvents')->prefix('news-and-events')->group(function () {
            Route::resource('news', 'NewsController');
            Route::resource('categories', 'CategoriesController');
        });

        // gallery / photos
        Route::namespace('Photos')->prefix('photos')->group(function () {
            Route::get('/', 'PhotosController@index');
            Route::delete('/{photo}', 'PhotosController@destroy');
            Route::post('/upload', 'PhotosController@uploadPhotos');
            Route::post('/{photo}/edit/name', 'PhotosController@updatePhotoName');
            Route::post('/{photo}/cover', 'PhotosController@updatePhotoCover');

            // photoables
            Route::get('/news/{news}', 'PhotosController@showNewsPhotos');
            Route::get('/articles/{article}', 'PhotosController@showArticlePhotos');

            Route::resource('/albums', 'AlbumsController', ['except' => 'show']);
            Route::get('/albums/{album}', 'PhotosController@showAlbumPhotos');

            // croppers
            Route::post('/crop/{photo}', 'CropperController@cropPhoto');
            Route::get('/news/{news}/crop/{photo}', 'CropperController@showNewsPhoto');
            Route::get('/albums/{album}/crop/{photo}', 'CropperController@showAlbumsPhoto');
            Route::get('/articles/{article}/crop/{photo}', 'CropperController@showArticlesPhoto');

            // resource image crop
            Route::post('/crop-resource', 'CropResourceController@cropPhoto');
            Route::get('/banners/{banner}/crop-resource/', 'CropResourceController@showBanner');
        });

        // accounts
        Route::namespace('Accounts')->prefix('accounts')->group(function () {
            // clients
            Route::post('clients/filter', 'ClientsController@filter');
            Route::resource('clients', 'ClientsController')->parameters([
                'clients' => 'user'
            ]);
            Route::post('clients/{user}/notify/forgot-password',
                'ClientsController@sendResetLinkEmail');

            // users
            Route::get('administrators/invites', 'AdministratorsController@showInvites');
            Route::post('administrators/invites', 'AdministratorsController@postInvite');
            Route::resource('administrators', 'AdministratorsController');
        });

        // corporate
        Route::namespace('Newsletter')->prefix('newsletter')->group(function () {
            Route::resource('subscribers', 'SubscribersController');
        });

        // documents
        Route::namespace('Documents')->prefix('documents')->group(function () {
            // documents
            Route::get('/', 'DocumentsController@index');
            Route::delete('/{document}', 'DocumentsController@destroy');
            Route::post('/upload', 'DocumentsController@upload');
            Route::post('/{document}/edit/name', 'DocumentsController@updateName');

            // documentable
            Route::get('/category/{category}', 'DocumentsController@showCategory');

            // categories
            Route::resource('/categories', 'CategoriesController');
        });

        // reports
        Route::namespace('Reports')->prefix('reports')->group(function () {
            Route::get('summary', 'SummaryController@index');

            // feedback contact us
             Route::get('contact-us', 'ContactUsController@index');
             Route::post('contact-us/chart', 'ContactUsController@getChartData');
             Route::get('contact-us/datatable', 'ContactUsController@getTableData');
        });

        Route::namespace('Settings')->prefix('settings')->group(function () {
            Route::resource('roles', 'RolesController');
            Route::resource('permissions', 'PermissionController');

            // settings
            Route::resource('settings', 'SettingsController');

            // navigation
            Route::get('navigation/order', 'NavigationOrderController@index');
            Route::post('navigation/order', 'NavigationOrderController@updateOrder');
            Route::get('navigation/datatable', 'NavigationController@getTableData');
            Route::resource('navigation', 'NavigationController');
        });

        Route::namespace('Locations')->prefix('general/locations')->group(function () {
            Route::resource('suburbs', 'SuburbsController');
            Route::resource('cities', 'CitiesController');
            Route::resource('provinces', 'ProvincesController');
            Route::resource('countries', 'CountriesController');
        });

        /*
|--------------------------------------------------------------------------
| Impersonation Routes
|--------------------------------------------------------------------------
|
| Here is the routes to impersonate another user in your application
| You can disable registering of this routes if you prefer to
| register your own.
|
*/
        Route::group([
            'middleware' => ['web', 'auth'],
            'prefix'     => 'impersonate',
        ], function () {
            Route::post('/logout', 'ImpersonateController@logout')
                ->name('impersonate.logout');
            Route::post('/login/{user}', 'ImpersonateController@login')
                ->name('impersonate.login')
//                ->middleware('auth.admin')
            ;
        });

        Route::namespace('Developer')->prefix('developer/area')->group(function () {

            //Backup Area
            Route::get('backup', 'BackupController@index');
            Route::put('backup/create', 'BackupController@create');
            Route::get('backup/download/{file_name?}', 'BackupController@download');
            Route::delete('backup/delete/{file_name?}', 'BackupController@delete')->where('file_name', '(.*)');

            // Logs Area
            Route::get('log', 'LogController@index');
            Route::get('log/preview/{file_name}', 'LogController@preview');
            Route::get('log/download/{file_name}', 'LogController@download');
            Route::delete('log/delete/{file_name}', 'LogController@delete');

        }); // Developer Area


    }); // End Auth
});