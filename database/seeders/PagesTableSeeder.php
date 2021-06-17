<?php

namespace Database\Seeders;

use App\Models\Pages\Page;
use App\Models\Pages\PageTranslation;
use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $page = new Page();
        $page -> save();

        $page_translation = new PageTranslation();
        $page_translation -> page_id = $page -> id;
        $page_translation -> locale ='en';
        $page_translation -> title = 'about us';
        $page_translation -> slug = 'about_us';
        $page_translation -> content = null;
        $page_translation -> meta_title = null;
        $page_translation -> meta_description = null;
        $page_translation -> meta_keyword = null;
        $page_translation -> save();

        $page_translation = new PageTranslation();
        $page_translation -> page_id = $page -> id;
        $page_translation -> locale ='ar';
        $page_translation -> title = 'معلومات عنا';
        $page_translation -> slug = 'من-نحن';
        $page_translation -> content = null;
        $page_translation -> meta_title = null;
        $page_translation -> meta_description = null;
        $page_translation -> meta_keyword = null;
        $page_translation -> save();

    } // end of run
}
