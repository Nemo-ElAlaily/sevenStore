<?php

namespace App\Http\Livewire;

use App\Models\Orders\Order;
use Livewire\Component;
use App\Models\Settings\SiteSetting;

class TrackYourOrderComponent extends Component
{
    public function render()
    {
        $orders = Order::where('user_id', auth() -> user() -> id)->latest()->paginate(5);
        return view('themes.' . SiteSetting::find(1) -> theme -> name. '.livewire.track-your-order-component', compact('orders'))->layout('themes.' . SiteSetting::find(1) -> theme -> name. '.layouts.app');
    }
}
