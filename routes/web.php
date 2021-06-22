<?php

use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\SingleProductComponent;
use App\Http\Livewire\MainCategoryComponent;
use App\Http\Livewire\ThankyouComponent;
use App\Http\Livewire\WishlistComponent;
use App\Http\Livewire\PageComponent;
use App\Http\Livewire\ProfileComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
define('FRONT_PAGINATION_COUNT', 20);

Route::get('/welcome', '\App\Http\Controllers\HomeController@welcome')->name('app.welcome');
Route::get('/welcome/start', '\App\Http\Controllers\HomeController@initApp')->name('app.start');

Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ], 'name' => 'front.'], function() {
    Route::name('front.')->group(function () {

        Route::get('/', HomeComponent::class)->name('index');
        Route::get('/shop', ShopComponent::class)->name('shop');
        Route::get('/cart', CartComponent::class)->name('product.cart');
        Route::get('/checkout', CheckoutComponent::class)->name('checkout')->middleware('auth', 'verified');
        Route::get('/thank-you', ThankyouComponent::class)->name('thank_you')->middleware('auth', 'verified');
        Route::get('/profile', ProfileComponent::class)->name('profile')->middleware('auth', 'verified');

        Route::get('/product/{slug}', SingleProductComponent::class)->name('product.details');

        Route::get('/product-category/{slug}', MainCategoryComponent::class)->name('product.category');

        Route::get('/wishlist', WishlistComponent::class)->name('product.wishlist');

        Route::get('/pages/{slug}', PageComponent::class)->name('page.details');

    });

    Auth::routes(['verify' => true]);

});
