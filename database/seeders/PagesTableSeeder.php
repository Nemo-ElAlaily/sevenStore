<?php

namespace Database\Seeders;

use App\Models\Pages\Page;
use App\Models\Pages\PageTranslation;
use Corcel\Model\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $wp_db_pages = Post::where('post_type', 'page')
                        ->whereNotIn('post_name', [
                        'shop',
                        'cart',
                        'checkout',
                        'blog',
                        'my-account',
                        'store-directory',
                        'compare',
                        'home-mobile',
                        'dashboard',
                        'my-orders',
                        'homepage',
                        'import',
                        'site-map',
                        'accept-payments',
                    ])->paginate(ADMIN_PAGINATION_COUNT);

        foreach ($wp_db_pages as $page)
        {
            DB::beginTransaction();

                $new_page = new Page();
                $new_page -> is_active = $page -> status == 'publish' ? 1 : 0;
                $new_page -> save();

                $new_page_translation = new PageTranslation();
                $new_page_translation -> page_id = $new_page -> id;
                $new_page_translation -> locale ='en';
                $new_page_translation -> title = $page -> title;
                $new_page_translation -> slug = $page -> post_name;
                $new_page_translation -> content = $page -> post_content;
                $new_page_translation -> meta_title = null;
                $new_page_translation -> meta_description = null;
                $new_page_translation -> meta_keyword = null;
                $new_page_translation -> save();

                $new_page_translation = new PageTranslation();
                $new_page_translation -> page_id = $new_page -> id;
                $new_page_translation -> locale ='ar';
                $new_page_translation -> title = $page -> title;
                $new_page_translation -> slug = $page -> post_name;
                $new_page_translation -> content = $page -> post_content;
                $new_page_translation -> meta_title = null;
                $new_page_translation -> meta_description = null;
                $new_page_translation -> meta_keyword = null;
                $new_page_translation -> save();

            DB::commit();

        } // end of for each


    } // end of run
}
