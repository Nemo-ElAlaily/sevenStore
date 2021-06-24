<?php

namespace App\Http\Controllers;

use App\Http\Requests\Settings\DatabaseSettingsRequest;
use App\Models\Settings\DatabaseSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
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
        return view('admin.cuba.forms.db-new');
    } // end of welcome

    public function initApp(DatabaseSettingsRequest $request)
    {
        $request_data = $request->except(['_token', '_method']);

        DB::beginTransaction();

            $path = base_path('config/database.php');
            $contents = File::get($path);

            $contents = str_replace("env('DB_HOST')", "'" . $request_data['DB_HOST'] . "'", $contents);
            $contents = str_replace("env('DB_DATABASE')", "'" . $request_data['DB_DATABASE'] . "'", $contents);
            $contents = str_replace("env('DB_USERNAME')", "'" . $request_data['DB_USERNAME'] . "'", $contents);
            $contents = str_replace("env('DB_PASSWORD')", "'" . $request_data['DB_PASSWORD'] . "'", $contents);

            $contents = str_replace("env('WP_DB_HOST')", "'" . $request_data['WP_DB_HOST'] . "'", $contents);
            $contents = str_replace("env('WP_DB_DATABASE')", "'" . $request_data['WP_DB_DATABASE'] . "'", $contents);
            $contents = str_replace("env('WP_DB_USERNAME')", "'" . $request_data['WP_DB_USERNAME'] . "'", $contents);
            $contents = str_replace("env('WP_DB_PASSWORD')", "'" . $request_data['WP_DB_PASSWORD'] . "'", $contents);

            File::put($path, $contents);

            Artisan::call('migrate:fresh');


            $database_settings = DatabaseSetting::create([
                'DB_HOST' => $request_data['DB_HOST'],
                'DB_DATABASE' => $request_data['DB_DATABASE'],
                'DB_USERNAME' => $request_data['DB_USERNAME'],
                'DB_PASSWORD' => $request_data['DB_PASSWORD'],
                'WP_DB_HOST' => $request_data['WP_DB_HOST'],
                'WP_DB_DATABASE' => $request_data['WP_DB_DATABASE'],
                'WP_DB_USERNAME' => $request_data['WP_DB_USERNAME'],
                'WP_DB_PASSWORD' => $request_data['WP_DB_PASSWORD'],
            ]);

        DB::commit();

        Artisan::call('db:seed');

        $app_path = base_path('app/Providers/AppServiceProvider.php');
        $contents = File::get($app_path);

        $contents = str_replace("// Fetch the Site Settings object", "// Fetch the Site Settings object
        \$site_settings = SiteSetting::find(1);
        \$social_settings = SocialSetting::all();
        \$main_categories = MainCategory::all();
        View::share([
            'site_settings' =>  \$site_settings,
            'social_settings' => \$social_settings,
            'main_categories' => \$main_categories,
        ]);", $contents);

        File::put($app_path, $contents);

        session()->flash('success', 'Your App Started Successfully :)');
        return redirect()->route('admin.index');

    } // end of initApp

} // end of controller
