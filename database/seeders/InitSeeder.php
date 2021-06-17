<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class InitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LaratrustSeeder::class);
        $this->call(DatabaseSettingsTableSeeder::class);
        $this->call(SiteSettingsTableSeeder::class);
        $this->call(SocialSettingTableSeeder::class);

        \App\Models\User::create([
            'first_name' => 'super',
            'last_name' => 'admin',
            'slug' => 'super-admin',
            'email' => 'super_admin@app.com',
            'password' => bcrypt('Store@admin.store'),
            'email_verified_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $user = \App\Models\User::where('email', 'super_admin@app.com')->first();

        $user -> attachRole('super_admin');
    }
}
