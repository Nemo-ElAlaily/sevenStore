<?php

namespace App\Http\Livewire;

use App\Models\Blogs\Blog;
use Livewire\Component;
use App\Models\Settings\SiteSetting;

class SingleBlogComponent extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this -> slug = $slug;
    } // end of mount
    public function render()
    {
        $blog = Blog::whereTranslation('slug', $this -> slug) -> first();

        return  view('themes.' . SiteSetting::find(1) -> theme -> name. '.livewire.single-blog-component',
            compact('blog'))
            ->layout('themes.' . SiteSetting::find(1) -> theme -> name. '.layouts.app');
    }
}
