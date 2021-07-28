<?php

namespace App\Http\Livewire;

use App\Models\Products\Product;
use App\Models\Wishlist;
use Livewire\Component;
use App\Models\Settings\SiteSetting;
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
        Cart::instance('cart')->add($product_id, $product_name, $this -> qty, $product_price)->associate(\App\Models\Products\Product::class);
        session()->flash('success', trans('front.Item Added in Shopping Cart'));
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

    public function addToWishlist($product_id, $product_name, $product_price)
    {
//        $db_wishlist = Wishlist::where(['product_id' => $product_id, 'user_id' => auth() -> user() -> id ])->first();
        $item = Cart::instance('wishlist')->add($product_id, $product_name, 1, $product_price)->associate(\App\Models\Products\Product::class);
//        if(!$db_wishlist) {
//            $wishlist_item = Wishlist::firstOrCreate([
//                'user_id' => auth() -> user() -> id,
//                'product_id' => $item -> id,
//            ]);
//        }

        $this->emitTo('wishlist-count-component', 'refreshComponent');
        session()->flash('success', trans('front.Item Added to Wishlist'));

    } // end of add to wishlist

    public function removeFromWishlist($product_id)
    {
////        $db_wishlist = Wishlist::where(['product_id' => $product_id, 'user_id' => auth() -> user() -> id ])->first();
//        if($db_wishlist){
//            $db_wishlist -> delete();
//        }
        foreach (Cart::instance('wishlist') -> content() as $witem) {


            if ($witem -> id == $product_id) {
                Cart::instance('wishlist') -> remove($witem -> rowId);
                $this->emitTo('wishlist-count-component', 'refreshComponent');
                session()->flash('error', trans('front.Item Removed to Wishlist'));
                return;
            } // end of if

        } // end of foreach

    } // end of remove from wishlist

    public function addToCompare($product_id, $product_name, $product_price)
    {
        Cart::instance('compare')->add($product_id, $product_name, 1, $product_price)->associate(\App\Models\Products\Product::class);
        $this->emitTo('compare-count-component', 'refreshComponent');
        session()->flash('success', trans('front.Item Added in Compare list'));
    } // end of add to Compare list

    public function removeFromCompare($product_id)
    {
        foreach (Cart::instance('compare') -> content() as $compareItem) {

            if ($compareItem -> id == $product_id) {
                Cart::instance('compare') -> remove($compareItem -> rowId);
                $this->emitTo('compare-count-component', 'refreshComponent');
                session()->flash('error', trans('front.Item Removed From Compare list'));
            } // end of if

        } // end of foreach
    } // end of remove from Compare list

    public function render()
    {
        $product = Product::whereTranslation('slug', $this -> slug) -> first();

            return  view('themes.' . SiteSetting::find(1) -> theme -> name. '.livewire.single-product-component',
                 compact('product'))
                ->layout('themes.' . SiteSetting::find(1) -> theme -> name. '.layouts.app');
    }
}
