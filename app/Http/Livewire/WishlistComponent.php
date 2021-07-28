<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Settings\SiteSetting;
use Cart;

class WishlistComponent extends Component
{
    public function moveProductFromWishlistToCart($rowId)
    {
        $item = Cart::instance('wishlist')->get($rowId);
        Cart::instance('wishlist')->remove($rowId);
        Cart::instance('cart')->add($item -> id, $item -> name, 1, $item -> price) -> associate(\App\Models\Products\Product::class);
        $this->emitTo('wishlist-count-component', 'refreshComponent');
        $this->emitTo('cart-count-component', 'refreshComponent');
        session()->flash('success', trans('front.Item Moved to Cart'));

    } // end of move Product From Wish list To Cart

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
        return view('themes.' . SiteSetting::find(1) -> theme -> name. '.livewire.wishlist-component')->layout('themes.' . SiteSetting::find(1) -> theme -> name. '.layouts.app');
    } // end of render

} // end of component
