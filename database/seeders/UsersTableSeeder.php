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
            \App\Models\User::create($values);

//            $user = \App\Models\User::where('id', $user -> ID)->first();
//            $user -> attachRole('user');

        } // end of for each

    } // end of run

} // end of seeder
