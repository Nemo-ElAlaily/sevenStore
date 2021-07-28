<?php

namespace App\Http\Livewire;

use App\Models\Pages\Page;
use Livewire\Component;

class PageComponent extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this -> slug = $slug;

    } // end of mount

    public function render()
    {
        $page = Page::whereTranslationLike('slug', $this -> slug)->active()->first();
        return view('themes.electro.livewire.page-component', compact('page'))->layout('themes.electro.layouts.app');
    }
}
