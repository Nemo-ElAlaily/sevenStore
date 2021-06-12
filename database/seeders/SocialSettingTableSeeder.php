<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SocialSettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            'facebook', 'twitter', 'whatsApp', 'linkedIn', 'pinterest', 'instagram', 'youtube',
        ];

        foreach ($settings as $setting){
            $values = [];
            $values += [
                'key' =>  $setting,
            ];

            \App\Models\Settings\SocialSetting::create($values);
        } // end of foreach

    } // end of run

} // end of seeder
