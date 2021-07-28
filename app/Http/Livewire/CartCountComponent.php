<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Settings\SiteSetting;
use App\Models\Products\Product;

class CartCountComponent extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh'];

    public function render()
    {
        return view('themes.' . SiteSetting::find(1) -> theme -> name. '.livewire.cart-count-component');
    }
}
