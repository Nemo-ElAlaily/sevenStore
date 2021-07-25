<?php

namespace App\Http\Livewire;

use App\Models\Products\Product;
use App\Models\Wishlist;
use Cart;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\MainCategories\MainCategory;


class ShopComponent extends Component
{
    public $sorting;
    public $pagesize;

    public function mount()
    {
        $this -> sorting = 'default';
        $this -> pagesize = FRONT_PAGINATION_COUNT;
    } // end of mount

    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate(\App\Models\Product::class);
        $this->emitTo('cart-count-component', 'refreshComponent');
        session()->flash('success', 'Item Added in Shopping Cart');
        return redirect()->back();

    } // end of store

    public function addToWishlist($product_id, $product_name, $product_price)
    {
        $db_wishlist = Wishlist::where(['product_id' => $product_id, 'user_id' => auth() -> user() -> id ])->first();
        $item = Cart::instance('wishlist')->add($product_id, $product_name, 1, $product_price)->associate(\App\Models\Product::class);
        if(!$db_wishlist) {
            $wishlist_item = Wishlist::firstOrCreate([
                'user_id' => auth() -> user() -> id,
                'product_id' => $item -> id,
            ]);
        }

        $this->emitTo('wishlist-count-component', 'refreshComponent');
        session()->flash('success', 'Item Added to Wishlist');

    } // end of add to wishlist

    public function removeFromWishlist($product_id)
    {
        $db_wishlist = Wishlist::where(['product_id' => $product_id, 'user_id' => auth() -> user() -> id ])->first();
        if($db_wishlist){
            $db_wishlist -> delete();
        }
        foreach (Cart::instance('wishlist') -> content() as $witem) {


            if ($witem -> id == $product_id) {
                Cart::instance('wishlist') -> remove($witem -> rowId);
                $this->emitTo('wishlist-count-component', 'refreshComponent');
                return;
            } // end of if

        } // end of foreach

    } // end of remove from wishlist

    public function addToCompare($product_id, $product_name, $product_price)
    {
        Cart::instance('compare')->add($product_id, $product_name, 1, $product_price)->associate(\App\Models\Products\Product::class);
        $this->emitTo('compare-count-component', 'refreshComponent');
        session()->flash('success', 'Item Added in Compare list');
    } // end of add to Compare list

    public function removeFromCompare($product_id)
    {
        foreach (Cart::instance('compare') -> content() as $compareItem) {

            if ($compareItem -> id == $product_id) {
                Cart::instance('compare') -> remove($compareItem -> rowId);
                $this->emitTo('compare-count-component', 'refreshComponent');
                session()->flash('error', 'Item Removed From Compare list');
            } // end of if

        } // end of foreach
    } // end of remove from Compare list



    use WithPagination;

    public function render(Request $request)
    {
        if ( $this -> sorting == 'date')
        {
            $products = Product::where('stock' , '>' , 0)
                ->orderBy('created_at', 'DESC')
                ->when($request -> search , function ($query) use ($request) {
                    return $query -> whereTranslationLike('name', '%' . $request -> search . '%');
                })->when($request -> product_cat , function($query) use ($request) {
                    return $query->where('main_category_id', $request -> product_cat);
                })->paginate($this -> pagesize);
        }
        elseif ( $this -> sorting == 'price')
        {
            $products = Product::where('stock' , '>' , 0)
                ->orderBy('regular_price', 'ASC')
                ->when($request -> search , function ($query) use ($request) {
                    return $query -> whereTranslationLike('name', '%' . $request -> search . '%');
                })->when($request -> product_cat , function($query) use ($request) {
                    return $query->where('main_category_id', $request -> product_cat);
                })->paginate($this -> pagesize);

        }
        elseif ( $this -> sorting == 'price-desc') {
            $products = Product::where('stock' , '>' , 0)
                ->orderBy('regular_price', 'DESC')
                ->when($request -> search , function ($query) use ($request) {
                    return $query -> whereTranslationLike('name', '%' . $request -> search . '%');
                })->when($request -> product_cat , function($query) use ($request) {
                    return $query->where('main_category_id', $request -> product_cat);
                })->paginate($this -> pagesize);
        }
        else
        {
            $products = Product::where('stock' , '>' , 0)
                ->when($request -> search , function ($query) use ($request) {
                    return $query -> whereTranslationLike('name', '%' . $request -> search . '%');
                })->when($request -> product_cat , function($query) use ($request) {
                    return $query->where('main_category_id', $request -> product_cat);
                })->paginate($this -> pagesize);
        }

        $categories = MainCategory::whereHas('translations', function ($query) {
            $query
                ->where('locale', MainCategory::locale())
                ->where('name', 'NOT LIKE', 'بدون تصنيف');
        })->where('parent_id', 0)->get();
        $latest_products = Product::orderBy('created_at', 'DESC')->take(5)->get();


        return view('livewire.shop-component', compact('products', 'categories', 'latest_products'))->layout('layouts.front.app');
    } // end of render

} // end of component
