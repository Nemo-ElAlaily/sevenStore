<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

define('ADMIN_PAGINATION_COUNT', 10);

Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function() {
    Route::prefix('admin')->name('admin.')->middleware( ['auth', 'role:super_admin|admin|vendor|shop_manager|moderator'])->group(function () {

        Route::get('/', 'AdminController@index')->name('index');

        /* Site Settings Routes */
        Route::get('site_settings/{id}', 'SiteSettingController@generalShow')->name('settings.site.show');
        Route::put('site_settings/{id}', 'SiteSettingController@generalUpdate')->name('settings.site.update');

        Route::get('social-settings', 'SiteSettingController@socialShow')->name('settings.social.show');
        Route::post('social-settings', 'SiteSettingController@socialUpdate')->name('settings.social.update');

        Route::get('database/{id}', 'SiteSettingController@databaseShow')->name('settings.database.show');
        Route::put('database/{id}', 'SiteSettingController@databaseUpdate')->name('settings.database.update');
        Route::get('database/{id}/migrate', 'SiteSettingController@runMigration')->name('settings.database.migration');

        /* end site settings */

        /* users routes */
        Route::resource('/users', 'UserController')->except('show');
        Route::resource('/vendors', 'VendorController')->except('show');

        /* Products Routes */
        Route::resource('products', 'ProductController');
        /* end of Products Routes */

        /* Main Categories Routes */
        Route::resource('main_categories', 'MainCategoryController');
        /* end of Main Categories Routes */

        /* Pages Routes */
        Route::resource('pages', 'PageController');
        /* end of Pages Routes */

        /* Orders Routes */
        Route::resource('orders', 'OrderController')->except(['create', 'store']);
        Route::get('orders/{id}/sent', 'OrderController@shippingOrder')->name('orders.shippingOrder');
        Route::get('orders/{id}/delivered', 'OrderController@deliveredOrder')->name('orders.deliveredOrder');
        Route::get('orders/{id}/completed', 'OrderController@completedOrder')->name('orders.completedOrder');
        /* end of Orders Routes */

        /* blogs routes */
        Route::resource('/blogs', 'BlogController');
        /* tags routes */
        Route::resource('/tags', 'TagController');
        /* currencies routes */
        Route::resource('currencies', 'CurrencyController');
        /* countries routes */
        Route::resource('countries', 'Shipping\CountryController');
        /* cities routes */
        Route::resource('cities', 'Shipping\CityController');
        /* regions routes */
        Route::resource('regions', 'Shipping\RegionController');

    });

});
