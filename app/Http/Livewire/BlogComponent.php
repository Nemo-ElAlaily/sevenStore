<?php

namespace App\Http\Livewire;

use App\Models\Blogs\Blog;
use Livewire\Component;
use App\Models\Settings\SiteSetting;

class BlogComponent extends Component
{
    public function render()
    {
        $blogs = Blog::with('tags')->paginate(FRONT_PAGINATION_COUNT);
        return view('themes.' . SiteSetting::find(1) -> theme -> name. '.livewire.blog-component', compact('blogs'))->layout('themes.' . SiteSetting::find(1) -> theme -> name. '.layouts.app');
    }
}
