<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CompareCountComponent extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh'];

    public function render()
    {
        return view('themes.electro.livewire.compare-count-component');
    }
}
