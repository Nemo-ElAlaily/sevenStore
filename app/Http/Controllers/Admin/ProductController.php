<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\Products\ProductCreateRequest;
use App\Http\Requests\Products\ProductUpdateRequest;
use App\Models\MainCategories\MainCategory;
use App\Models\Products\Product;
use App\Models\Products\ProductGallery;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct()
    {
        $this -> middleware(['permission:products_read'])->only('index');
        $this -> middleware(['permission:products_create'])->only(['create', 'store']);
        $this -> middleware(['permission:products_update'])->only(['edit', 'update']);
        $this -> middleware(['permission:products_delete'])->only(['destroy']);
    } // end of construct

    public function index(Request $request)
    {

        $categories = MainCategory::all();

        if(auth() -> user() -> hasRole(['super_admin', 'admin', 'shop_manager', 'moderator'])) {
            $products = Product::when($request -> search , function ($query) use ($request) {
                return $query -> whereTranslationLike('name', '%' . $request -> search . '%');
            })->when($request -> category , function($query) use ($request) {
                return $query -> where('main_category_id', $request -> category);
            })->when($request -> vendor_id , function($query) use ($request) {
                return $query -> where('vendor_id', $request -> vendor_id);
            })->latest()->paginate(ADMIN_PAGINATION_COUNT);

        } else {
            $products = Product::where('vendor_id' , auth() -> user()->id)->when($request -> search , function ($query) use ($request) {
                return $query -> whereTranslationLike('name', '%' . $request -> search . '%');
            })->latest()->paginate(ADMIN_PAGINATION_COUNT);
        }

        return view('admin.cuba.products.index' , compact('products' , 'categories'));

    } // end of index

    public function create()
    {
        try {
            $categories = MainCategory::all();
            $user = User::find(Auth::user() -> id) -> id;

            return view('admin.cuba.products.create', compact( 'categories', 'user'));

        } catch (\Exception $exception) {

            session()->flash('error', trans('validation.contact admin'));
            return redirect()->route('admin.products.index' );

        } // end of try & catch

    } // end of create

    public function store(ProductCreateRequest $request)
    {
        $characters = array(' ', '/', '!', '\\');

        try {
            $user = $request -> vendor_id;

            $request_data = $request -> except(['_token', '_method', 'image' , 'gallery']);

            $request_data['ar']['slug'] = str_replace($characters, '-' , $request['ar']['name']);
            $request_data['en']['slug'] = str_replace($characters, '-' , $request['en']['name']);

            DB::beginTransaction();

            $image_path = "";
            if($request -> image){
                $image_path = uploadImage('uploads/products/' . Carbon::now() -> year . '/' . Carbon::now() -> month . '/' ,  $request -> image);
                $request_data['image'] = Carbon::now() -> year . '/' . Carbon::now() -> month . '/' . $image_path;
            } else {
                $request_data['image'] = 'default.png';
            }

            $product =  Product::create($request_data);

            if($request -> gallery){
                foreach ( $request -> gallery as $index => $item){
                    $gallery_item_path = uploadImage('uploads/products/product-gallery/' . Carbon::now() -> year . '/' . Carbon::now() -> month . '/' ,  $item);

                    $gallery_arr = [
                        'product_id' => $product -> id,
                    ];
                    $gallery_arr += [
                        'image_path' => Carbon::now() -> year . '/' . Carbon::now() -> month . '/'  . $gallery_item_path,
                    ];

                    ProductGallery::create($gallery_arr);
                }
            }

            DB::commit();

            session()->flash('success', trans('validation.Added Successfully'));
            return redirect()->route('admin.products.index');

        } catch (\Exception $exception) {

            DB::rollback();
            return $exception;
            session()->flash('error', trans('validation.contact admin'));
            return redirect()->route('admin.products.index');

        } // end of try & catch

    } // end of store

    public function show($id)
    {
        try {
            $product = Product::with('gallery')->find($id);

            if(!$product){
                session()->flash('error', trans('validation.do not exists'));
                return redirect()->route('admin.products.index');
            }
            $categories = MainCategory::where(['id' => $product -> main_category_id ])->orWhere(['parent_id' => $product -> main_category_id]) -> get();

            return view('admin.cuba.products.show', compact('product', 'categories'));

        } catch (\Exception $exception) {

            session()->flash('error', trans('validation.contact admin'));
            return redirect()->route('admin.products.index');

        }
    } // end of show

    public function edit($id)
    {
        try {
            $product = Product::with('gallery')->find($id);

            if(!$product){
                session()->flash('error', trans('validation.do not exists'));
                return redirect()->route('admin.products.index');
            }

            $categories = MainCategory::where(['id' => $product -> main_category_id ])->orWhere(['parent_id' => $product -> main_category_id]) -> get();

            return view('admin.cuba.products.edit', compact('product', 'categories'));

        } catch (\Exception $exception) {

            session()->flash('error', trans('validation.contact admin'));
            return redirect()->route('admin.products.index');

        } // end of try & catch

    } // end of edit

    public function update($id, ProductUpdateRequest $request)
    {
        $characters = array(' ', '/', '!', '\\');

        try {
            $product = Product::find($id);

            if(!$product){
                session()->flash('error', trans('validation.do not exists'));
                return redirect()->route('admin.products.index');
            }

            $request_data = $request -> except(['_token', '_method', 'image' , 'gallery']);

            $request_data['ar']['slug'] = str_replace($characters, '-' , $request['ar']['name']);
            $request_data['en']['slug'] = str_replace($characters, '-' , $request['en']['name']);

            DB::beginTransaction();

            $imagePath = "";
            if($request -> image){
                if ($product -> image != 'default.png') {
                    Storage::disk('public_uploads')->delete('/products/' . $product -> image);
                    $image_path = uploadImage('uploads/products/' . Carbon::now() -> year . '/' . Carbon::now() -> month . '/' ,  $request -> image);
                    $request_data['image'] = Carbon::now() -> year . '/' . Carbon::now() -> month . '/' . $image_path;
                } // end of inner if

            } else {
                $request_data['image'] = $product -> image;
            }// end of outer if

            $product -> update($request_data);

            DB::commit();

            session()->flash('success', trans('validation.Updated Successfully'));
            return redirect()->route('admin.products.index');

        } catch (\Exception $exception) {

            DB::rollback();
            return $exception;
            session()->flash('error', trans('validation.contact admin'));
            return redirect()->route('admin.products.index');

        } // end of try & catch

    } // end of update

    public function destroy($id)
    {
        $product = Product::find($id);

        if(!$product){
            session()->flash('error', trans('validation.do not exists'));
            return redirect()->route('admin.products.index');
        }

        try {
            if ($product -> image != 'default.png') {
                Storage::disk('public_uploads')->delete('products/' . $product -> image);
            } // end of inner if

            $product -> delete();

            session()->flash('success', trans('validation.Deleted Successfully'));
            return redirect()->route('admin.products.index');

        } catch (\Exception $exception) {

            session()->flash('error', trans('validation.contact admin'));
            return redirect()->route('admin.products.index');

        } // end of try & catch

    } // end of destroy

} // end of controller
