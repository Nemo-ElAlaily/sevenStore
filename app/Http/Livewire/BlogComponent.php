<?php

namespace App\Http\Livewire;

use App\Models\Blogs\Blog;
use Livewire\Component;

class BlogComponent extends Component
{
    public function render()
    {
        $blogs = Blog::paginate(FRONT_PAGINATION_COUNT);
        return view('livewire.blog-component', compact('blogs'))->layout('layouts.front.app');
    }
}
