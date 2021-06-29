<?php

namespace App\Http\Livewire;

use App\Models\Orders\Order;
use Livewire\Component;

class TrackYourOrderComponent extends Component
{
    public function render()
    {
        $orders = Order::where('user_id', auth() -> user() -> id)->get();
        return view('livewire.track-your-order-component', compact('orders'))->layout('layouts.front.app');
    }
}
