<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Orders\Order;
use App\Models\Orders\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this -> middleware(['permission:orders_read'])->only('index');
        $this -> middleware(['permission:orders_create'])->only(['create', 'store']);
        $this -> middleware(['permission:orders_update'])->only(['edit', 'update']);
        $this -> middleware(['permission:orders_delete'])->only(['destroy']);
    } // end of construct

    public function index(Request $request)
    {
        $statuses = Order::select('status')->where('status', 'not like', 'completed')->where('status', 'not like', 'trashed')->groupBy('status')->get();

        $orders = Order::where('status', 'not like', 'completed')->where('status', 'not like', 'trashed')->when($request -> search , function ($query) use ($request) {
            return $query -> where('order_status', 'like', '%' . $request -> search . '%');
        })->when($request -> status , function($query) use ($request) {
            return $query -> where('status', $request -> status);
        })->latest()->paginate(ADMIN_PAGINATION_COUNT);

        return view('admin.cuba.orders.index', compact('orders', 'statuses'));

    } // end of index

    public function show($id)
    {
        $order = Order::with('orderItems')->find($id);

        $items = OrderItem::where('order_id', $id)->get();

        return view('admin.cuba.orders.show', compact('order', 'items'));

    } // end of show

    public function destroy($id)
    {
        $order = Order::find($id);

        $order -> update([
            'status' => 'trash',
        ]);

        session()->flash('success', 'Order status Changed');
        return redirect()->route('admin.orders.index');

    } // end of destroy

    public function completedOrders()
    {
        return $completed_order = Order::where('status', 'completed')->paginate(ADMIN_PAGINATION_COUNT);

    } // end of completed orders

    public function trashedOrders()
    {
        return $completed_order = Order::where('status', 'trash')->paginate(ADMIN_PAGINATION_COUNT);

    } // end of completed orders

} // end of controller
