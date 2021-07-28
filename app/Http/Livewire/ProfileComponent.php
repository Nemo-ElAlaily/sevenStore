<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProfileComponent extends Component
{
    public function render()
    {
        return view('themes.electro.livewire.profile-component')->layout('themes.electro.layouts.app');
    }
}
