<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Cart;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\MainCategory;

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
        Cart::add($product_id, $product_name, 1, $product_price)->associate(\App\Models\Product::class);
        session()->flash('success', 'Item Added to Cart');
        return redirect()->route('front.product.cart');

    } // end of store

    use WithPagination;

    public function render()
    {
        $main_category = MainCategory::where('slug', $this -> category_slug)->first();
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

        $categories = MainCategory::where('name', 'not like', 'بدون تصنيف')->where('parent_id', 0)->get();


        return view('livewire.main-category-component', compact('products', 'categories', 'main_category_name'))->layout('layouts.front.app');
    } // end of render

} // end of component
