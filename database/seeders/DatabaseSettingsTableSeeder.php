<?php

namespace Database\Seeders;

use App\Models\Settings\DatabaseSetting;
use Illuminate\Database\Seeder;

class DatabaseSettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $database_settings = new DatabaseSetting();
        $database_settings -> WP_DATABASE_URL = env('WP_DATABASE_URL');
        $database_settings -> WP_DB_CONNECTION = env('WP_DB_CONNECTION');
        $database_settings -> WP_DB_HOST = env('WP_DB_HOST');
        $database_settings -> WP_DB_PORT = env('WP_DB_PORT');
        $database_settings -> WP_DB_DATABASE = env('WP_DB_DATABASE');
        $database_settings -> WP_DB_USERNAME = env('WP_DB_USERNAME');
        $database_settings -> WP_DB_PASSWORD = env('WP_DB_PASSWORD');

        $database_settings -> save();
    }
}
