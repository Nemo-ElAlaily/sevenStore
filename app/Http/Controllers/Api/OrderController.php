<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Orders\Order;
use App\Http\Resources\orderResource;


class OrderController extends Controller
{
    //
    public function getUserOrder($id){
        $orders = Order::where('user_id',$id)->get();
        return response()->json(['success'=>'true','data'=>orderResource::collection($orders)]);

    }
}
