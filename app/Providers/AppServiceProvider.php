<?php

namespace App\Providers;

use App\Models\MainCategory;
use App\Models\Settings\SiteSetting;
use App\Models\Settings\SocialSetting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */

    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Fetch the Site Settings object

        Paginator::useBootstrap();
    }
}
