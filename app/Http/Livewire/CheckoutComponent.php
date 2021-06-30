<?php

namespace App\Http\Livewire;

use App\Models\Orders\Order;
use App\Models\Orders\OrderItem;
use App\Models\Products\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Cart;
use Illuminate\Support\Facades\Auth;


class CheckoutComponent extends Component
{
    public  $first_name;
    public  $last_name;
    public  $email;
    public  $phone;
    public  $shipping_address_1;
    public  $shipping_address_2;
    public  $shipping_city;
    public  $shipping_country;
    public  $shipping_postcode;
    public  $payment_method;
    public  $terms;
    public  $make_main_data;

    public $thank_you;

    public function mount()
    {
        $this -> first_name = Auth::user() -> first_name;
        $this -> last_name = Auth::user() -> last_name;
        $this -> email = Auth::user() -> email;
        $this -> shipping_address_1 = Auth::user() -> shipping_address_1;
        $this -> shipping_address_2 = Auth::user() -> shipping_address_2;
        $this -> shipping_city = Auth::user() -> shipping_city;
        $this -> shipping_country = Auth::user() -> shipping_country;
        $this -> shipping_postcode = Auth::user() -> shipping_postcode;
        $this -> payment_method = 'bacs';

    }

    public function placeOrder()
    {
        $this -> validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'shipping_address_1' => 'required',
            'shipping_city' => 'required',
            'shipping_country' => 'required',
            'payment_method' => 'required',
            'terms' => 'required',
        ]); // end of validation

        DB::beginTransaction();
        if($this -> make_main_data == 1){
            Auth::user() -> update([
               'first_name' => $this -> first_name,
               'last_name' => $this -> last_name,
               'phone' => $this -> phone,
               'shipping_address_1' => $this -> shipping_address_1,
               'shipping_address_2' => $this -> shipping_address_2,
               'shipping_city' => $this -> shipping_city,
               'shipping_postcode' => $this -> shipping_postcode,
               'shipping_country' => $this -> shipping_country,
            ]);
        }

        // ------------- start save order
        $order = new Order();
        $order -> user_id = Auth::user() -> id;
        $order -> status = 'ordered';
        $order -> subtotal = doubleval(Cart::instance('cart') -> subtotal);
        $order -> discount = doubleval(Cart::instance('cart')->discount);
        $order -> tax = doubleval(Cart::instance('cart') -> tax);
        $order -> total = doubleval(Cart::instance('cart') -> total);
        $order -> slug = 'order_' . $this -> id;
        $order -> currency = 'EGP';
        $order -> address_1 = $this -> shipping_address_1;
        $order -> address_2 = $this -> shipping_address_2;
        $order -> city = $this -> shipping_city;
        $order -> country = $this -> shipping_country;
        $order -> email = $this -> email;
        $order -> phone = $this -> phone;
        $order -> shipping_cost = 0;
        $order -> shipping_status = 0;

        if($this -> payment_method == 'cod'){
            $order -> payment_method = 0;
            $order -> is_paid = false;
        } elseif ($this -> payment_method == 'paymob') {
            $order -> payment_method = 1;
            $order -> is_paid = true;
            $order -> paid_at = Carbon::now();
            $order -> transaction_id = $this -> id;
        } elseif ($this -> payment_method == 'fawry') {
            $order -> payment_method = 2;
            $order -> is_paid = true;
            $order -> paid_at = Carbon::now();
            $order -> transaction_id = $this -> id;
        } elseif ($this -> payment_method == 'bacs') {
            $order -> payment_method = 3;
            $order -> is_paid = true;
            $order -> paid_at = Carbon::now();
            $order -> transaction_id = $this -> id;
        } else {
            $order -> payment_method = 4;
            $order -> is_paid = false;
        }

        $order -> save();

        // ---------- start save order item
        foreach(Cart::instance('cart') -> content() as $item)
        {
            $orderItem = new OrderItem();
            $orderItem -> order_id = $order -> id;
            $orderItem -> product_id = $item -> id;
            $orderItem -> qty = $item -> qty;
            $orderItem -> product_sale_price = $item -> price;
            $orderItem -> item_total = $item -> total;
            $orderItem -> save();
        } // end of for each order item

        DB::commit();

        $this -> thank_you = 1;
        Cart::instance('cart')->destroy();
        session()->forget('checkout');

    } // end of place order

    public function verifyForCheckout()
    {
        if($this -> thank_you == 1) {
            return redirect() -> route('front.thank_you');
        } // end of if

    } // end of verify for checkout

    public function render()
    {
        $this -> verifyForCheckout();
        if(Cart::instance('cart') -> count() > 0){
            return view('livewire.checkout-component')->layout('layouts.front.app');
        } else {
            return view('livewire.cart-component')->layout('layouts.front.app');
        }
    } // end of render

} // end of component
