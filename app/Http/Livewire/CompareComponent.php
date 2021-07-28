<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Settings\SiteSetting;
use Cart;

class CompareComponent extends Component
{
    public function moveProductFromCompareToCart($rowId)
    {
        $item = Cart::instance('compare')->get($rowId);
        Cart::instance('compare')->remove($rowId);
        Cart::instance('cart')->add($item -> id, $item -> name, 1, $item -> price) ->associate(\App\Models\Products\Product::class);
        $this->emitTo('compare-count-component', 'refreshComponent');
        $this->emitTo('cart-count-component', 'refreshComponent');
        session()->flash('success', trans('front.Item Moved to Cart'));

    } // end of move Product From Wish list To Cart

    public function removeFromCompare($product_id)
    {
        foreach (Cart::instance('compare') -> content() as $compareItem) {

            if ($compareItem -> id == $product_id) {
                Cart::instance('compare') -> remove($compareItem -> rowId);
                $this->emitTo('compare-count-component', 'refreshComponent');
                session()->flash('error', trans('front.Item Removed from List'));

                return;
            } // end of if

        } // end of foreach

    } // end of remove from compare

    public function render()
    {
        return view('themes.' . SiteSetting::find(1) -> theme -> name. '.livewire.compare-component')->layout('themes.' . SiteSetting::find(1) -> theme -> name. '.layouts.app');
    } // end of render
}
