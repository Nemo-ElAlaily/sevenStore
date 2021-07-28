<?php

namespace App\Http\Livewire;

use App\Models\Orders\Order;
use Livewire\Component;
use App\Models\Settings\SiteSetting;

class OrderDetailsComponent extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this -> slug = $slug;
    } // end of mount

    public function render()
    {
        $order = Order::where('slug', $this -> slug)->with('orderItems')-> first();

        return view('themes.' . SiteSetting::find(1) -> theme -> name. '.livewire.order-details-component', compact('order'))->layout('themes.' . SiteSetting::find(1) -> theme -> name. '.layouts.app');
    }
}
