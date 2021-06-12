<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class CartComponent extends Component
{
    public function increaseQty($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product -> qty + 1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->emitTo('cart-count-component', 'refreshComponent');
//        session()->flash('success', 'Quantity Updated');
//        return redirect()->route('add.product.cart');

    } // end of increase Qty

    public function decreaseQty($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product -> qty - 1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->emitTo('cart-count-component', 'refreshComponent');

    } // end of decrease Qty

    public function destroy($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        $this->emitTo('cart-count-component', 'refreshComponent');
        session()->flash('success', 'Item Removed from Your Cart');
    } // end of destroy

    public function destroyAll()
    {
        Cart::instance('cart')->destroy();
        $this->emitTo('cart-count-component', 'refreshComponent');
        session()->flash('success', 'All Items Removed from Your Cart');

    } // end of destroy All

    public function setAmountForCheckout()
    {
        if(!Cart::instance('cart') -> count() > 0)
        {
            session() -> forget('checkout');
            return;
        } // end of if to check on cart after checkout

        if(session() -> has('coupon')){
            session() -> put('checkout', [
               'discount' => $this -> discount,
               'subtotal' => $this -> subtotalAfterDiscount,
                'tax' => $this -> taxAfterDiscount,
                'total' => $this -> totalAfterDiscount,
            ]);
        } else {
            session() -> put('checkout', [
                'discount' => 0,
                'subtotal' => Cart::instance('cart') -> subtotal(),
                'tax' => Cart::instance('cart') -> tax(),
                'total' => Cart::instance('cart') -> total(),
            ]);
        } // end of if-else
    } // end of set amount for check out

    public function render()
    {
        $this -> setAmountForCheckout();
        return view('livewire.cart-component')->layout('layouts.front.app');
    } // end of render

} // end of component
