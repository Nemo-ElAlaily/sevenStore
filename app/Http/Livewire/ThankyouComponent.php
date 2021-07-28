<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ThankyouComponent extends Component
{
    public function render()
    {
        return view('themes.electro.livewire.thankyou-component')->layout('themes.electro.layouts.app');
    }
}
