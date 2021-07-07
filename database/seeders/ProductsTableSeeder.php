<?php

namespace Database\Seeders;

use App\Models\MainCategories\MainCategory;
use App\Models\Products\ProductGallery;
use App\Models\Products\ProductTag;
use App\Models\WP\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $wp_db_products = Post::products()->get();
        $characters = array(' ', '/', '!', '\\');
        foreach ($wp_db_products as $product)
        {
            DB::beginTransaction();

            $user = \App\Models\User::find($product -> post_author);
            $main_category = $product->taxonomies()->where('taxonomy', 'product_cat')->first();

            if ($main_category) {
                $db_categories = MainCategory::whereTranslation('name', $main_category -> name) -> first();
            } else {
                $db_categories = MainCategory::whereTranslation('name', 'بدون تصنيف') -> first();
            }

            $values = [];

            if($product -> getStock() > 0 ){
                $values += [
                    'stock' => $product -> getStock()
                ];
            } else {
                $values += [
                    'stock' => '0'
                ];
            }

            $values += [
                'id' => $product -> ID,
                'vendor_id' => $user -> id,
                'main_category_id' => $db_categories -> id,

                'image' => $product -> image,

                'sku' => $product -> getSku(),
                'sale_price' => $product -> getSalePrice() != null ? $product -> getSalePrice() : ($product -> getRegularPrice() == null ? 0 : $product -> getRegularPrice()),
                'regular_price' => $product -> getRegularPrice() != null ? $product -> getRegularPrice() : 0,

                'status' => $product -> status,

                'created_at' => $product -> date,
                'updated_at' => $product -> modified,
            ];

            $new_product = \App\Models\Products\Product::create($values);


            foreach(config('translatable.locales') as $locale) {
                $values_translation = [];
                $values_translation += [
                    'product_id' => $new_product -> id,
                    'locale' => $locale,
                    'name' => $product -> title,
                    'slug' => str_replace($characters, '-' , $product -> title),
                    'description' => $product -> content,
                    'features' => $product -> excerpt,
                ];
                \App\Models\Products\ProductTranslation::create($values_translation);
            }




            foreach ($product -> attachment as $gallery_item)
            {
                if($gallery_item -> guid != $new_product -> image) {

                    $product_gallery = ProductGallery::where('image_path', $gallery_item -> guid)->firstOrCreate([
                        'product_id' => $new_product -> id,
                        'image_path' => $gallery_item -> guid,
                    ]);

                } // end of if

            } // end of gallery foreach

            $product_tags = $product -> taxonomies -> where('taxonomy', 'product_tag');
            foreach ($product_tags as $tag) {
                ProductTag::create([
                   'tag_id' => $tag -> term_id,
                    'product_id' => $tag -> pivot -> object_id,
                ]);
            } // end of tag foreach

            DB::commit();

        } // end of for each

    } // end of run

} // end of seeder
