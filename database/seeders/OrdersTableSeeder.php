<?php

namespace Database\Seeders;

use Corcel\WooCommerce\Model\Item;
use Corcel\WooCommerce\Model\Order;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $wp_db_Orders = Order::where('post_parent', 0) -> get();

        foreach ($wp_db_Orders as $order)
        {
            if($order -> payment -> method == 'cod'){
                $payment_method = 0;
            } elseif ($order -> payment -> method == 'paymob') {
                $payment_method = 1;
            } elseif ($order -> payment -> method == 'fawry'){
                $payment_method = 2;
            } else {
                $payment_method = 4;
            }

            if($order -> status == 'processing'){
                $shipping_status = 0;
            } elseif ($order -> status == 'on-hold') {
                $shipping_status = 1;
            } elseif ($order -> status == 'completed'){
                $shipping_status = 2;
            } else {
                $shipping_status = 3;
            }

            $values = [];
            $values += [
                'id' => $order -> ID,
                'user_id' => $order -> customer_id != 0 ? $order -> customer_id : \App\Models\User::where('slug', 'removed')->first() -> id,
                'status' =>  $order -> status,

                'subtotal' => $order -> total - $order -> tax - $order -> shipping_tax - $order -> shipping ,
                'tax' => $order -> tax == null ? 0 : $order -> tax,
                'discount' => 0,
                'total' => $order -> total,
                'payment_method' => $payment_method ,

                'slug' => str_replace('wc_' , '', $order -> post_password),
                'currency' => $order -> currency,

                'is_paid' => $order -> date_paid == null ? false : true,
                'paid_at' => $order  -> date_paid ,

                'address_1' => $order -> shipping_address -> address_1,
                'address_2' => $order -> shipping_address -> address_2,
                'city' => $order -> shipping_address -> city,
                'state' => $order -> shipping_address -> state,
                'country' => $order -> shipping_address -> country ,
                'phone' => $order -> billing_address -> phone,
                'email' => $order -> billing_address -> email,
                'shipping_cost' => $order -> shipping == null ? 0 : $order -> shipping,
                'shipping_status' => $shipping_status,

                'created_at' => $order -> post_date,
                'updated_at' => $order -> post_modified,
            ];

            \App\Models\Orders\Order::create($values);

            $wp_db_order_items = Item::where(['order_id' => $order -> ID, 'order_item_type' => 'line_item'])->get();

            foreach ($wp_db_order_items as $item)
            {
                $items_arr = [];
                $items_arr += [
                    'order_id' => $item -> order_id,
                    'product_id' => $item -> product_id,
                    'qty' => $item -> quantity,
                    'item_total' => $item -> line_total,
                    'product_sale_price' => \App\Models\Product::find($item -> product_id)->sale_price,
                ];

                \App\Models\Orders\OrderItem::create($items_arr);

            } // end of items foreach

        } // end of for each

    } // end of run

} // end of seeder
