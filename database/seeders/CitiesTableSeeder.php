<?php

namespace Database\Seeders;

use App\Models\Shipping\Cities\City;
use App\Models\Shipping\Cities\CityTranslation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::beginTransaction();

            $city = new City();
            $city -> country_id = 1;
            $city -> save();

            $city_translation = new CityTranslation();
            $city_translation -> city_id = $city -> id;
            $city_translation -> locale = 'ar';
            $city_translation -> name = 'القاهرة';
            $city_translation -> save();

            $city_translation = new CityTranslation();
            $city_translation -> city_id = $city -> id;
            $city_translation -> locale = 'en';
            $city_translation -> name = 'cairo';
            $city_translation -> save();

        DB::commit();
    }
}
