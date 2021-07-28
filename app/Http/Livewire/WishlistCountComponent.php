<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Settings\SiteSetting;

class WishlistCountComponent extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh'];

    public function render()
    {
        return view('themes.' . SiteSetting::find(1) -> theme -> name. '.livewire.wishlist-count-component');
    }
}
