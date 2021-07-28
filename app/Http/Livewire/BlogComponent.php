<?php

namespace App\Http\Livewire;

use App\Models\Blogs\Blog;
use Livewire\Component;

class BlogComponent extends Component
{
    public function render()
    {
        $blogs = Blog::paginate(FRONT_PAGINATION_COUNT);
        return view('themes.electro.livewire.blog-component', compact('blogs'))->layout('themes.electro.layouts.app');
    }
}
