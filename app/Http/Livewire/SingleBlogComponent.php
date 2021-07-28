<?php

namespace App\Http\Livewire;

use App\Models\Blogs\Blog;
use Livewire\Component;

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

        return  view('themes.electro.livewire.single-blog-component',
            compact('blog'))
            ->layout('themes.electro.layouts.app');
    }
}
