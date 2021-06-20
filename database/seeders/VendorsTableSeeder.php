<?php

namespace Database\Seeders;

use App\Models\WP\Post;
use Corcel\Model\User;
use Illuminate\Database\Seeder;

class VendorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $wp_db_products = Post::products()->groupBy('post_author')->get();

        foreach ($wp_db_products as $product) {

            $values = [];
            $values += [
                'user_id' => $product -> post_author,
            ];
            $user = User::where('ID', $product -> post_author)->first();
            $values += [
                'billing_first_name' => $user -> meta -> billing_first_name,
                'billing_last_name' => $user -> meta -> billing_last_name,
                'billing_company' => $user -> meta -> billing_company,
                'billing_address_1' => $user -> meta -> billing_address_1,
                'billing_address_2' => $user -> meta -> billing_address_2,
                'billing_city' => $user -> meta -> billing_city,
                'billing_postcode' => $user -> meta -> billing_postcode,
                'billing_country' => $user -> meta -> billing_country,
                'billing_phone' => $user -> meta -> billing_phone,
                'billing_email' => $user -> meta -> billing_email,

                'can_sell_products' => $user -> meta -> dokan_enable_selling == 'yes' ? 1 : 0,
                'can_add_products' => $user -> meta -> dokan_publishing == 'yes' ? 1 : 0,
                'admin_percentage' => $user -> meta -> dokan_admin_percentage != null ?  $user -> meta -> dokan_admin_percentage : null,
            ];

           \App\Models\Vendor::create($values);

        } // end of foreach

    } // end of run

} // end of seeder
