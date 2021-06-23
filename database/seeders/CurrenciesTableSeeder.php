<?php

namespace Database\Seeders;

use App\Models\Currencies\Currency;
use App\Models\Currencies\CurrencyTranslation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::beginTransaction();

            $currency = new Currency();
            $currency -> symbol = '£';
            $currency -> save();

            $currency_translation = new CurrencyTranslation();
            $currency_translation -> currency_id = $currency -> id;
            $currency_translation -> locale = 'ar';
            $currency_translation -> name = 'جنيه مصري';
            $currency_translation -> save();

            $currency_translation = new CurrencyTranslation();
            $currency_translation -> currency_id = $currency -> id;
            $currency_translation -> locale = 'en';
            $currency_translation -> name = 'Egyptian Pound';
            $currency_translation -> save();

        DB::commit();
    }
}
