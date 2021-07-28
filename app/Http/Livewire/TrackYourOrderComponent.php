<?php

namespace App\Http\Livewire;

use App\Models\Orders\Order;
use Livewire\Component;

class TrackYourOrderComponent extends Component
{
    public function render()
    {
        $orders = Order::where('user_id', auth() -> user() -> id)->latest()->paginate(5);
        return view('themes.electro.livewire.track-your-order-component', compact('orders'))->layout('themes.electro.layouts.app');
    }
}
