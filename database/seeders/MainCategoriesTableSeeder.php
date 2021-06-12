<?php

namespace Database\Seeders;

use Corcel\Model\Taxonomy;
use Illuminate\Database\Seeder;

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
            \App\Models\MainCategory::where('name', $category)->firstOrCreate([
                'id' => $category -> term_id,
                'name' => $category -> name,
                'slug' => str_replace($characters, '-' , $category -> name),
                'parent_id' => $category -> parent,
                'image' => 'default.png',
            ]);
        } // end of foreach

    } // end of run

} // end of seeder
