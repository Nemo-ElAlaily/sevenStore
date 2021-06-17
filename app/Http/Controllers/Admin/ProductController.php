<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\MainCategory;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
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

        $categories = MainCategory::select('id', 'name')->get();

        if(auth() -> user() -> hasRole(['super_admin', 'admin', 'shop_manager', 'moderator'])) {
            $products = Product::when($request -> search , function ($query) use ($request) {
                return $query -> where('name', 'like', '%' . $request -> search . '%');
            })->when($request -> category , function($query) use ($request) {
                return $query -> where('main_category_id', $request -> category);
            })->when($request -> vendor_id , function($query) use ($request) {
                return $query -> where('vendor_id', $request -> vendor_id);
            })->paginate(ADMIN_PAGINATION_COUNT);

        } else {
            $products = Product::where('vendor_id' , auth() -> user()->id)->when($request -> search , function ($query) use ($request) {
                return $query -> where('name', 'like', '%' . $request -> search . '%');
            })->latest()->paginate(ADMIN_PAGINATION_COUNT);
        }

        return view('admin.cuba.products.index' , compact('products' , 'categories'));

    } // end of index

    public function create()
    {
        try {
            $user = auth() -> user() -> id;
            $categories = MainCategory::all();

            return view('admin.cuba.products.create', compact( 'categories', 'user'));

        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.products.index' );

        } // end of try & catch

    } // end of create

    public function store(ProductRequest $request)
    {
        try {
            DB::beginTransaction();

            $imagePath = "";
            if($request -> image){
                $imagePath = uploadImage('uploads/products/' . Carbon::now() -> year . '/' . Carbon::now() -> month . '/' ,  $request -> image);
            } else {
                $imagePath = 'default.png';
            }

            $product =  Product::create([
                'vendor_id' => 8,
                'name' => $request -> name,
                'slug' => str_replace(characters(), '-' , $request -> name),
                'stock' => $request -> stock,
                'regular_price' => $request -> regular_price,
                'sku' => $request -> sku,
                'sale_price' => $request -> sale_price,
                'main_category_id' => $request -> main_category,
                'description' => $request -> description,
                'features' => $request -> features,
                'image' =>  Carbon::now() -> year . '/' . Carbon::now() -> month . '/' .$imagePath,
            ]);

            DB::commit();

            session()->flash('success', 'Product Added Successfully');
            return redirect()->route('admin.products.index');

        } catch (\Exception $exception) {

            DB::rollback();
            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.products.index');

        } // end of try & catch

    } // end of store

    public function show($id)
    {
        try {
            $product = Product::find($id);

            if(!$product){
                session()->flash('error', "Product Doesn't Exist or has been deleted");
                return redirect()->route('admin.products.index');
            }

            if($product -> vendor_id != auth() -> user() -> id){
                session()->flash('error', "Product Doesn't Exist or has been deleted");
                return redirect()->route('admin.products.index');
            }

            return view('admin.cuba.products.show', compact('product'));

        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.products.index');

        }
    } // end of show

    public function edit($id)
    {
        try {
            $product = Product::find($id);

            if(!$product){
                session()->flash('error', "Product Doesn't Exist or has been deleted");
                return redirect()->route('admin.products.index');
            }

            if($product -> vendor_id != auth() -> user() -> id){
                session()->flash('error', "Product Doesn't Exist or has been deleted");
                return redirect()->route('admin.products.index');
            }

            $categories = MainCategory::where(['id' => $product -> main_category_id ])->orWhere(['parent_id' => $product -> main_category_id]) -> get();

            return view('admin.cuba.products.edit', compact('product', 'categories'));

        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.products.index');

        } // end of try & catch

    } // end of edit

    public function update($id, Request $request)
    {
        try {
            $product = Product::find($id);

            if(!$product){
                session()->flash('error', "Product Doesn't Exist or has been deleted");
                return redirect()->route('admin.products.index');
            }

            if($product -> vendor_id != auth() -> user() -> id){
                session()->flash('error', "Product Doesn't Exist or has been deleted");
                return redirect()->route('admin.products.index');
            }

            $request -> validate([
                'name' => 'required',
                'regular_price' => 'required',
                'sale_price' => 'required',
                'sku' => 'required',
                'main_category' => 'required',
                'description' => 'required',
                'image' => 'mimes:jpeg,bmp,png,gif',
            ]);

            DB::beginTransaction();
            $imagePath = "";
            if($request->image){
                if ($product -> image != 'default.png') {
                    Storage::disk('public_uploads')->delete('uploads/products/' . $product -> image);
                } // end of inner if
                $imagePath = uploadImage('uploads/products/' .  Carbon::now() -> year . '/' . Carbon::now() -> month . '/' ,  $request -> image);
            } else {
                $imagePath = $product -> image_path;
            }// end of outer if

            $product -> update([
                'name' => $request -> name,
                'slug' => str_replace(characters(), '-' , $request -> name),
                'stock' => $request -> stock,
                'regular_price' => $request -> regular_price,
                'sku' => $request -> sku,
                'sale_price' => $request -> sale_price,
                'main_category_id' => $request -> main_category,
                'description' => $request -> description,
                'features' => $request -> features,
                'image' => Carbon::now() -> year . '/' . Carbon::now() -> month . '/'  . $imagePath,
            ]);

            DB::commit();

            session()->flash('success', 'Product Updated Successfully');
            return redirect()->route('admin.products.index');

        } catch (\Exception $exception) {

            DB::rollback();
            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.products.index');

        } // end of try & catch

    } // end of update

    public function destroy($id)
    {
        $product = Product::find($id);

        if(!$product){
            session()->flash('error', "Product Doesn't Exist or has been deleted");
            return redirect()->route('admin.products.index');
        }

        if($product -> vendor_id != auth() -> user() -> id){
            session()->flash('error', "Product Doesn't Exist or has been deleted");
            return redirect()->route('admin.products.index');
        }

        try {
            if ($product -> image != 'default.png') {
                Storage::disk('public_uploads')->delete('products/' . $product -> image);
            } // end of inner if

            $product -> delete();

            session()->flash('success', 'Product Deleted Successfully');
            return redirect()->route('admin.products.index');

        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.products.index');

        } // end of try & catch

    } // end of destroy

} // end of controller
