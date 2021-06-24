<?php

namespace Database\Seeders;

use App\Models\Shipping\Countries\Country;
use App\Models\Shipping\Countries\CountryTranslation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::beginTransaction();

        $country = new Country();
        $country -> flag = 'eg.jpg';
        $country -> save();

        $country_translation = new CountryTranslation();
        $country_translation -> country_id = $country -> id;
        $country_translation -> locale = 'ar';
        $country_translation -> name = 'مصر';
        $country_translation -> save();

        $country_translation = new CountryTranslation();
        $country_translation -> country_id = $country -> id;
        $country_translation -> locale = 'en';
        $country_translation -> name = 'Egypt';
        $country_translation -> save();

        DB::commit();
    }
}
