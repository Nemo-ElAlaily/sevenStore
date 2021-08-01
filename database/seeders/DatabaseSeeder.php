<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LaratrustSeeder::class);
        //$this->call(DatabaseSettingsTableSeeder::class);
        $this->call(SiteSettingsTableSeeder::class);
        $this->call(SocialSettingTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        \App\Models\User::factory(1)->create();
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
        $this->call(VendorsTableSeeder::class);
        $this->call(MainCategoriesTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(BlogsTableSeeder::class);
        $this->call(CurrenciesTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(RegionsTableSeeder::class);
        $this->call(ThemesTableSeeder::class);
    }
}
