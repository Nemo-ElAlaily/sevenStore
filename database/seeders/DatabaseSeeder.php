<?php

namespace Database\Seeders;

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
        $this->call(DatabaseSettingsTableSeeder::class);
        $this->call(SiteSettingsTableSeeder::class);
        $this->call(SocialSettingTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        \App\Models\User::factory(1)->create();
        $this->call(VendorsTableSeeder::class);
        $this->call(MainCategoriesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
    }
}
