<?php

namespace App\Providers;

use App\Models\MainCategories\MainCategory;
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
<<<<<<< HEAD
       
=======
        $site_settings = SiteSetting::find(1);
        $social_settings = SocialSetting::all();
        $main_categories = MainCategory::all();
        View::share([
            'site_settings' =>  $site_settings,
            'social_settings' => $social_settings,
            'main_categories' => $main_categories,
        ]);
    
>>>>>>> fa037c83eb2ec2f559a40969f29fef04fda18ed3
        Paginator::useBootstrap();
    }
}
