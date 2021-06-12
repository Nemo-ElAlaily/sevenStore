<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Cart;

class HomeComponent extends Component
{
    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate(\App\Models\Product::class);
        $this->emitTo('cart-count-component', 'refreshComponent');
        session()->flash('success', 'Item Added in Shopping Cart');
        return redirect()->back();

    } // end of store

    public function addToWishlist($product_id, $product_name, $product_price)
    {
        Cart::instance('wishlist')->add($product_id, $product_name, 1, $product_price)->associate(\App\Models\Product::class);
        $this->emitTo('wishlist-count-component', 'refreshComponent');
        session()->flash('success', 'Item Added to Wishlist');

    } // end of add to wishlist

    public function removeFromWishlist($product_id)
    {
        foreach (Cart::instance('wishlist') -> content() as $witem) {

            if ($witem -> id == $product_id) {
                Cart::instance('wishlist') -> remove($witem -> rowId);
                $this->emitTo('wishlist-count-component', 'refreshComponent');
                return;
            } // end of if

        } // end of foreach

    } // end of remove from wishlist

    public function render()
    {
        $products_featured = Product::inRandomOrder()->take(5)->get();
        $products_on_sale = Product::inRandomOrder()->take(5)->get();
        $products_top_rated = Product::inRandomOrder()->take(5)->get();

        return view('livewire.home-component', compact('products_featured', 'products_on_sale', 'products_top_rated'))->layout('layouts.front.app');
    } // end of render

} // end of component
