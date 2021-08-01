<?php

namespace App\Http\Livewire;

use App\Models\MainCategories\MainCategory;
use App\Models\Pages\Page;
use App\Models\Products\Product;
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
        $categories = MainCategory::whereHas('translations', function ($query) {
            $query
                ->where('locale', MainCategory::locale())
                ->where('name', 'NOT LIKE', 'بدون تصنيف');
        })->where(['parent_id' => 0 ])->get();

        $latest_products = Product::orderBy('created_at', 'DESC')->take(5)->get();

        $page = Page::whereTranslationLike('slug', $this -> slug)->active()->first();

        return view('themes.' . SiteSetting::find(1) -> theme -> name. '.livewire.page-component', compact('page', 'categories', 'latest_products'))->layout('themes.' . SiteSetting::find(1) -> theme -> name. '.layouts.app');
    }
}
