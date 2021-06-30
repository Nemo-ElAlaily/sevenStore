<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WP\Post;


class AdminController extends Controller
{
    public function index()
    {
        $product = Post::find(13647);
        return $product -> attachment;
        return view('admin.cuba.index');

    }// end of index

} // end of controller
