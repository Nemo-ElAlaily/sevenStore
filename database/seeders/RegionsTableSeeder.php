<?php

namespace Database\Seeders;

use App\Models\Shipping\Regions\Region;
use App\Models\Shipping\Regions\RegionTranslation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::beginTransaction();

            $region = new Region();
            $region -> city_id = 1;
            $region -> shipping_cost = 10;
            $region -> save();

            $region_translation = new RegionTranslation();
            $region_translation -> region_id = $region -> id;
            $region_translation -> locale = 'ar';
            $region_translation -> name = 'مدينة نصر';
            $region_translation -> save();

            $region_translation = new RegionTranslation();
            $region_translation -> region_id = $region -> id;
            $region_translation -> locale = 'en';
            $region_translation -> name = 'Nasr City';
            $region_translation -> save();

        DB::commit();
    }
}
