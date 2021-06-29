<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CompareCountComponent extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh'];

    public function render()
    {
        return view('livewire.compare-count-component');
    }
}
