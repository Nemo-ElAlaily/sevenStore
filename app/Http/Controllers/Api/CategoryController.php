<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MainCategories\MainCategory;
use Illuminate\Http\Request;
use App\Http\Resources\CategoryResource;


class CategoryController extends Controller
{
    //
    public function getAllCategories(){
    $categories = MainCategory::all();
    return response()->json(['success'=>'true','data'=>CategoryResource::collection($categories)]);
    }
}
