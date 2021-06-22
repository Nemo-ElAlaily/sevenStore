<?php

namespace App\Http\Controllers;

use App\Models\WP\Post;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    } // end of index

    public function welcome()
    {
        return Post::find(24862);
        return view('welcome');
    } // end of welcome

    public function initApp()
    {
        Artisan::call('migrate:fresh');
        Artisan::call('db:seed --class=InitSeeder');

        $path = base_path('app/Providers/AppServiceProvider.php');
        $contents = File::get($path);

        $contents = str_replace("// Fetch the Site Settings object", "
        \$site_settings = SiteSetting::find(1);
        \$social_settings = SocialSetting::all();
        \$main_categories = MainCategory::all();
        View::share([
            'site_settings' =>  \$site_settings,
            'social_settings' => \$social_settings,
            'main_categories' => \$main_categories,
        ]);", $contents);

        File::put($path, $contents);

        session()->flash('success', 'Your App Started Successfully, Fill and Import Data from Wordpress');
        return redirect()->route('admin.settings.database.show', 1);

    } // end of initApp
} // end of controller
