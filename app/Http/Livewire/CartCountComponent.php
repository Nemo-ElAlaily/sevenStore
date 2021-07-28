<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Products\Product;

class CartCountComponent extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh'];

    public function render()
    {
        return view('livewire.cart-count-component');
    }
}
