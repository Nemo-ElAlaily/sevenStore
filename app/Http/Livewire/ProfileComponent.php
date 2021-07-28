<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Settings\SiteSetting;

class ProfileComponent extends Component
{
    public function render()
    {
        return view('themes.' . SiteSetting::find(1) -> theme -> name. '.livewire.profile-component')->layout('themes.' . SiteSetting::find(1) -> theme -> name. '.layouts.app');
    }
}
