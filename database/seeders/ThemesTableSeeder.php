<?php

namespace Database\Seeders;

use App\Models\Themes\Theme;
use Illuminate\Database\Seeder;

class ThemesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $theme = new Theme();
        $theme -> name = 'electro';
        $theme -> image = 'electro.png';
        $theme -> price = 100;
        $theme -> save();

        $theme = new Theme();
        $theme -> name = 'metronic';
        $theme -> image = 'metronic.png';
        $theme -> price = 80;
        $theme -> save();


    }
}
