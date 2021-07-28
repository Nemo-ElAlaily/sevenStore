<?php

namespace App\Http\Livewire;

use App\Models\Orders\Order;
use Livewire\Component;

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

        return view('themes.electro.livewire.order-details-component', compact('order'))->layout('themes.electro.layouts.app');
    }
}
