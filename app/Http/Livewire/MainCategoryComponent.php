<?php

namespace App\Http\Livewire;

use App\Models\Products\Product;
use Cart;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\MainCategories\MainCategory;

class MainCategoryComponent extends Component
{
    public $sorting;
    public $pagesize;
    public $category_slug;

    public function mount($slug)
    {
        $this -> sorting = 'default';
        $this -> pagesize = 12;
        $this -> category_slug = $slug;

    } // end of mount

    public function store($product_id, $product_name, $product_price)
    {
        Cart::add($product_id, $product_name, 1, $product_price)->associate(\App\Models\Products\Product::class);
        session()->flash('success', trans('front.Item Added in Shopping Cart'));
        return redirect()->route('front.product.cart');

    } // end of store

    use WithPagination;

    public function render()
    {
        $main_category = MainCategory::whereTranslation('slug', $this -> category_slug)->first();
        $main_category_id = $main_category -> id;
        $main_category_name = $main_category -> name;

        if ( $this -> sorting == 'date') {
            $products = Product::where('stock' , '>' , 0)->where('main_category_id', $main_category_id)->orderBy('created_at', 'DESC')->paginate($this -> pagesize);
        } elseif ( $this -> sorting == 'price') {
            $products = Product::where('stock' , '>' , 0)->where('main_category_id', $main_category_id)->orderBy('sale_price', 'ASC')->paginate($this -> pagesize);
        } elseif ( $this -> sorting == 'price-desc') {
            $products = Product::where('stock' , '>' , 0)->where('main_category_id', $main_category_id)->orderBy('sale_price', 'DESC')->paginate($this -> pagesize);
        } else {
            $products = Product::where('stock' , '>' , 0)->where('main_category_id', $main_category_id)->paginate($this -> pagesize);
        }

        $categories = MainCategory::whereHas('translations', function ($query) {
            $query
                ->where('locale', MainCategory::locale())
                ->where('name', 'NOT LIKE', 'بدون تصنيف');
        })->where('parent_id', 0)->get();
        $latest_products = Product::orderBy('created_at', 'DESC')->take(5)->get();


        return view('themes.electro.livewire.main-category-component', compact('products', 'categories', 'main_category_name', 'latest_products'))->layout('themes.electro.layouts.app');
    } // end of render

} // end of component
