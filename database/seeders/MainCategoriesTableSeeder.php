<?php

namespace Database\Seeders;

use App\Models\MainCategories\MainCategory;
use App\Models\MainCategories\MainCategoryTranslation;
use Corcel\Model\Taxonomy;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MainCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $characters = array(' ', '/', '!', '\\');

        $categories = Taxonomy::where('taxonomy', 'LIKE' ,  'product_cat')->get();

        foreach($categories as $category){

            DB::beginTransaction();

            $new_category = MainCategory::whereTranslation('name', $category)->firstOrCreate([
                'id' => $category -> term_id,
                'parent_id' => $category -> parent,
                'image' => 'default.png',
            ]);

            MainCategoryTranslation::create([
                'main_category_id' => $new_category -> id,
                'locale' => 'ar',
                'name' => $category -> name,
                'slug' =>  str_replace($characters, '-' , $category -> name),
            ]);

            MainCategoryTranslation::create([
                'main_category_id' => $new_category -> id,
                'locale' => 'en',
                'name' => $category -> name,
                'slug' =>  str_replace($characters, '-' , $category -> name),
            ]);

            DB::commit();

        } // end of foreach

    } // end of run

} // end of seeder
