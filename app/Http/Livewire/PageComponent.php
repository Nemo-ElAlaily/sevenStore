<?php

namespace App\Http\Livewire;

use App\Models\Pages\Page;
use Livewire\Component;
use App\Models\Settings\SiteSetting;

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
        return view('themes.' . SiteSetting::find(1) -> theme -> name. '.livewire.page-component', compact('page'))->layout('themes.' . SiteSetting::find(1) -> theme -> name. '.layouts.app');
    }
}
