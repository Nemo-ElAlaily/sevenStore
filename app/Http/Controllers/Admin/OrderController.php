<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Orders\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $statuses = Order::select('status')->where('status', 'not like', 'completed')->groupBy('status')->get();

        $orders = Order::where('status', 'not like', 'completed')->when($request -> search , function ($query) use ($request) {
            return $query -> where('order_status', 'like', '%' . $request -> search . '%');
        })->when($request -> status , function($query) use ($request) {
            return $query -> where('status', $request -> status);
        })->latest()->paginate(ADMIN_PAGINATION_COUNT);

        return view('admin.orders.index', compact('orders', 'statuses'));

    } // end of index

    public function show($id)
    {
        return $order = \Corcel\WooCommerce\Model\Order::find($id);

        return view('admin.orders.show', compact('order'));

    } // end of show

    public function edit($id)
    {
        $order = Order::find($id);

        return view('admin.orders.edit', compact('order'));

    } // end of edit

    public function update($id, Request $request)
    {
        $order = Order::find($id);

        return $request -> all();

    } // end of update


    public function destroy($id)
    {
        $order = Order::find($id);

        return $order;

    } // end of update

} // end of controller
