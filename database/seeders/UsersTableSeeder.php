<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Corcel\Model\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $wp_db_users = User::all();

        foreach ($wp_db_users as $user)
        {
            $values = [];
            $values += [
                'id' => $user -> ID,
                'email' => $user -> email,
                'password' => $user -> user_pass, //
                'avatar' => $user -> avatar,

                'first_name' => $user -> first_name,
                'last_name' => $user -> last_name,
                'slug' => $user -> first_name .'-'.$user -> last_name,

                'shipping_address_1' => $user -> meta -> shipping_address_1,
                'shipping_address_2' => $user -> meta -> shipping_address_2,
                'shipping_city' => $user -> meta -> shipping_city,
                'shipping_postcode' => $user -> meta -> shipping_postcode,
                'shipping_country' => $user -> meta -> shipping_country,

                'email_verified_at' => Carbon::now(),

                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
            $new_user = \App\Models\User::create($values);

            $role = $user -> meta -> wp_capabilities;

            if($role == 'a:1:{s:13:"administrator";b:1;}'){
                $new_user -> attachRole('admin');
            } elseif($role == 'a:1:{s:6:"seller";b:1;}') {
                $new_user -> attachRole('vendor');
            } elseif ($role == 'a:1:{s:12:"shop_manager";b:1;}'){
                $new_user -> attachRole('shop_manager');
            } else {
                $new_user -> attachRole('user');
            }

        } // end of for each

    } // end of run

} // end of seeder
