<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SiteSettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            'logo', 'title', 'welcome_phrase', 'phone', 'email', 'address', 'city', 'country', 'longitude', 'latitude'
        ];

        foreach ($settings as $setting){
            $values = [];
            $values += [
                'key' =>  $setting,
            ];

            \App\Models\Settings\SiteSetting::create($values);
        } // end of foreach

    } // end of run

} // end of seeder
