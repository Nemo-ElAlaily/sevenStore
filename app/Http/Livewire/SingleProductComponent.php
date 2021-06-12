<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Cart;

class SingleProductComponent extends Component
{
    public $slug;
    public $qty;

    public function mount($slug)
    {
        $this -> slug = $slug;
        $this -> qty = 1;
    } // end of mount

    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, $this -> qty, $product_price)->associate(\App\Models\Product::class);
        session()->flash('success', 'Item Added to Cart');
        return redirect()->route('front.product.cart');

    } // end of store

    public function increaseQty()
    {
        $this -> qty++;
    } // end of increase Qty

    public function decreaseQty($rowId)
    {
        if($this -> qty){
            $this -> qty--;
        }
    } // end of decrease Qty

    public function render()
    {
        $product = Product::where('slug', $this -> slug) -> first();

            return  view('livewire.single-product-component',
                 compact('product'))
                ->layout('layouts.front.app');
    }
}
