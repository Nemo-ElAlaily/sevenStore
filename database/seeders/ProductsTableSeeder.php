<?php

namespace Database\Seeders;

use App\Models\WP\Post;
use Illuminate\Database\Seeder;

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
            $user = \App\Models\User::with('vendor') -> find($product -> post_author);
            $main_category = $product->taxonomies()->where('taxonomy', 'product_cat')->first();

            if ($main_category) {
                $db_categories = \App\Models\MainCategory::where('name', $main_category -> name) -> first();
            } else {
                $db_categories = \App\Models\MainCategory::where('name', 'بدون تصنيف') -> first();
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
                'vendor_id' => $user -> vendor -> id,
                'main_category_id' => $db_categories -> id,

                'name' => $product -> title,
                'slug' => str_replace($characters, '-' , $product -> title),
                'description' => $product -> content,
                'features' => $product -> excerpt,
                'image' => $product -> image,

                'sku' => $product -> getSku() != null ? $product -> getSku() : null,
//                'stock' => $product -> getStock() != null ? $product -> getStock() : 0,
                'sale_price' => $product -> getSalePrice() != null ? $product -> getSalePrice() : ($product -> getRegularPrice() == null ? 0 : $product -> getRegularPrice()),
                'regular_price' => $product -> getRegularPrice() != null ? $product -> getRegularPrice() : 0,

                'status' => $product -> status,

                'created_at' => $product -> date,
                'updated_at' => $product -> modified,
            ];

            \App\Models\Product::create($values);

        } // end of for each

    } // end of run

} // end of seeder
