<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Products\Product;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;


class ProductController extends Controller
{
    //
    public function getAllProducts(){
        $products = Product::all();
        return response()->json(['success'=>'true','data'=>ProductResource::collection($products)]);
    }

    public function getProductsByCategory($id){
        $products = Product::where('main_category_id',$id)->get();
        return response()->json(['success'=>'true','data'=>ProductResource::collection($products)]);
    }

    public function getProductsByVendor($id){
        $products = Product::where('vendor_id',$id)->get();
        return response()->json(['success'=>'true','data'=>ProductResource::collection($products)]);
    }
}
