<?php

namespace App\Http\Livewire;

use App\Models\MainCategories\MainCategory;
use App\Models\Products\Product;
use App\Models\Sliders\Slider;
use Livewire\Component;
use App\Models\Settings\SiteSetting;
use Cart;

use App\Models\Settings\DatabaseSetting;

class HomeComponent extends Component
{
    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate(\App\Models\Products\Product::class);
        $this->emitTo('cart-count-component', 'refreshComponent');
        session()->flash('success', trans('front.Item Added in Shopping Cart'));
        return redirect()->back();

    } // end of store

    public function addToWishlist($product_id, $product_name, $product_price)
    {
        Cart::instance('wishlist')->add($product_id, $product_name, 1, $product_price)->associate(\App\Models\Products\Product::class);
        $this->emitTo('wishlist-count-component', 'refreshComponent');
        session()->flash('success', trans('front.Item Added to Wishlist'));

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
        $products_featured = Product::orderBy('created_at')->take(5)->get();
        $products_on_sale = Product::where('sale_price', '>' , 'regular_price')->inRandomOrder()->take(5)->get();
        $products_top_rated = Product::inRandomOrder()->take(5)->get();
        $latest_products = Product::orderBy('created_at', 'DESC')->take(10)->get();

        $categories = MainCategory::whereHas('translations', function ($query) {
            $query
                ->where('locale', MainCategory::locale())
                ->where('name', 'NOT LIKE', 'بدون تصنيف');
        })->where('parent_id', 0)->inRandomOrder()->take(20)->get();

        return  view('themes.' . SiteSetting::find(1) -> theme -> name. '.livewire.home-component',
                compact('products_featured', 'products_on_sale', 'products_top_rated', 'latest_products', 'categories'))
                ->layout('themes.' . SiteSetting::find(1) -> theme -> name. '.layouts.app');

    } // end of render

} // end of component
