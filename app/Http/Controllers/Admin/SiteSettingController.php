<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings\DatabaseSetting;
use App\Models\Settings\SiteSetting;
use App\Models\Settings\SocialSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class SiteSettingController extends Controller
{
    public function __construct()
    {
        $this -> middleware(['permission:site_settings_read'])->only(['generalShow', 'socialShow', 'databaseShow']);
        $this -> middleware(['permission:site_settings_update'])->only(['generalUpdate', 'socialUpdate', 'databaseUpdate']);
    } // end of construct

    public function generalShow($id)
    {
        $site_settings = SiteSetting::findorFail($id);
        return view('admin.cuba.site_settings.general', compact('site_settings'));
    } // end of general show

    public function generalUpdate($id, Request $request)
    {
        $site_settings = SiteSetting::findorFail($id);

        $request_data = $request->except(['_token', '_method']);

        $imagePath = "";
        if($request->logo){
            if ($site_settings -> logo != 'default.png') {
                Storage::disk('public_uploads')->delete('uploads/site/' . $site_settings -> logo);
            } // end of inner if
            $imagePath = uploadImage('uploads/site/',  $request -> logo);
        } else {
            $imagePath = $site_settings -> logo_path;
        }// end of outer if

        $request_data['logo'] = $imagePath;
        $site_settings->update($request_data);

        session()->flash('success', 'Site Settings Updated Successfully');
        return redirect()->route('admin.settings.site.show', $site_settings->id);

    } // end of social update

    public function socialShow()
    {
        $socials = SocialSetting::all();
        return view('admin.cuba.site_settings.social', compact('socials'));
    } // end of general show

    public function socialUpdate(Request $request)
    {
        $socials = SocialSetting::all();

        $request_data = $request -> except('_token', '_method');

        foreach ($socials as $social){
            $values = [];
            $setting_key = $socials -> where('key', $social -> key)-> first() -> key;

            $values += [
                'key' => $setting_key,
                'value' => $request_data[$setting_key],
            ];

            $social -> update($values);

        }  // end of foreach

        session()->flash('success', 'Settings Updated Successfully');
        return redirect()->route('admin.settings.social.show');

    } // end of general update

    public function databaseShow($id)
    {
        $database_settings = DatabaseSetting::findorFail($id);
        return view('admin.cuba.site_settings.database', compact('database_settings'));
    } // end of database show

    public function databaseStore(Request $request)
    {
        return $request -> all();
    //    try {
    //        $database_settings = DatabaseSetting::findorFail($id);
    //        $request_data = $request->except(['_token', '_method']);

    //        DB::beginTransaction();
    //        $database_settings -> update($request_data);

    //        $path = base_path('config\database.php');
    //        $contents = File::get($path);

    //        $contents = str_replace("env('DB_HOST')", "'" . $database_settings -> DB_HOST . "'", $contents);
    //        $contents = str_replace("env('DB_PORT')", "'" . $database_settings -> DB_PORT . "'", $contents);
    //        $contents = str_replace("env('DB_DATABASE')", "'" . $database_settings -> DB_DATABASE . "'", $contents);
    //        $contents = str_replace("env('DB_USERNAME')", "'" . $database_settings -> DB_USERNAME . "'", $contents);
    //        $contents = str_replace("env('DB_PASSWORD')", "'" . $database_settings -> DB_PASSWORD . "'", $contents);

    //        $contents = str_replace("env('WP_DB_HOST')", "'" . $database_settings -> WP_DB_HOST . "'", $contents);
    //        $contents = str_replace("env('WP_DB_PORT')", "'" . $database_settings -> WP_DB_PORT . "'", $contents);
    //        $contents = str_replace("env('WP_DB_DATABASE')", "'" . $database_settings -> WP_DB_DATABASE . "'", $contents);
    //        $contents = str_replace("env('WP_DB_USERNAME')", "'" . $database_settings -> WP_DB_USERNAME . "'", $contents);
    //        $contents = str_replace("env('WP_DB_PASSWORD')", "'" . $database_settings -> WP_DB_PASSWORD . "'", $contents);
    //        // and so on

    //        File::put($path, $contents);

    //        DB::commit();

    //        session()->flash('success', 'Database Settings Updated Successfully');
    //        return redirect()->route('admin.settings.database.show', $database_settings->id);
    //    }
    //    catch (\Exception $exception)
    //    {
    //        DB::rollBack();
    //        session()->flash('error', 'Something Went Wrong Please Contact Administrator');
    //        return redirect()->route('admin.settings.database.show', $database_settings->id);
    //    }

    } // end of database update

    public function runMigration($id)
    {
        Artisan::call('db:seed');
        $database_settings = DatabaseSetting::findOrFail($id);
        session()->flash('success', 'Database Migrated Successfully');
        return redirect()->route('admin.settings.database.show', $database_settings->id);
    } // end of run migration command

} // end of controller
