<?php

namespace App\Providers;

use App\Models\MainCategories\MainCategory;
use App\Models\Settings\SiteSetting;
use App\Models\Pages\Page;

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
        $site_settings = SiteSetting::find(1);
        $social_settings = SocialSetting::all();
        $main_categories = MainCategory::where('show_in_navbar','1')->get();
        View::share([
            'site_settings' =>  $site_settings,
            'social_settings' => $social_settings,
            'main_categories' => $main_categories,
        ]);

        Paginator::useBootstrap();
    }
}
