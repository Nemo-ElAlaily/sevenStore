<?php

namespace Database\Seeders;

use App\Models\Settings\SiteSetting;
use App\Models\Settings\SiteSettingTranslation;
use Illuminate\Database\Seeder;

class SiteSettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $site_settings = new SiteSetting();
        $site_settings -> logo = 'default.png';
        $site_settings -> save();

        $site_settings_translation = new SiteSettingTranslation();
        $site_settings_translation -> site_setting_id = $site_settings -> id;
        $site_settings_translation -> locale = 'en';
        $site_settings_translation -> title = 'Test title';
        $site_settings_translation -> welcome_phrase = 'test welcome phrase';
        $site_settings_translation -> address = 'Test Address';
        $site_settings_translation -> city = 'test city';
        $site_settings_translation -> country = 'test country';
        $site_settings_translation -> meta_title = 'test Meta title';
        $site_settings_translation -> meta_description = 'test meta description';
        $site_settings_translation -> meta_keyword = 'test meta_keyword';
        $site_settings_translation -> save();

        $site_settings_translation = new SiteSettingTranslation();
        $site_settings_translation -> site_setting_id = $site_settings -> id;
        $site_settings_translation -> locale = 'ar';
        $site_settings_translation -> title = 'AR Test title';
        $site_settings_translation -> welcome_phrase = 'AR test welcome phrase';
        $site_settings_translation -> address = 'AR Test Address';
        $site_settings_translation -> city = 'AR test city';
        $site_settings_translation -> country = 'AR test country';
        $site_settings_translation -> meta_title = 'AR test Meta title';
        $site_settings_translation -> meta_description = 'AR test meta description';
        $site_settings_translation -> meta_keyword = 'AR test meta_keyword';
        $site_settings_translation -> save();
    }
}
