<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blogs\Blog;
use App\Models\Orders\Order;
use App\Models\User;
use App\Models\WP\Post;
use Corcel\Model\Taxonomy;

class AdminController extends Controller
{
    public function index()
    {
        $wp_tags = Taxonomy::where('taxonomy', 'like', '%tag%')->get();

        return $products = Post::find(24832) -> taxonomies -> where('taxonomy', 'product_tag');

        $orders_count = Order::where('status', ['on-hold', 'processing'])->count();
        $products_count = Product::where('status', 'publish')->count();
        $blog_count = Blog::count();
        $users_count = User::whereRoleIs('user')->count();
        return view('admin.cuba.index' , compact('orders_count', 'products_count', 'blog_count', 'users_count'));

    }// end of index

} // end of controller
