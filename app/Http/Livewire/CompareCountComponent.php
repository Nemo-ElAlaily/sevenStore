<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Settings\SiteSetting;

class CompareCountComponent extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh'];

    public function render()
    {
        return view('themes.' . SiteSetting::find(1) -> theme -> name. '.livewire.compare-count-component');
    }
}
