<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pages\PageCreateRequest;
use App\Http\Requests\Pages\PageUpdateRequest;
use App\Models\Pages\Page;
use App\Models\MainCategories\MainCategory;

use Illuminate\Http\Request;

class MenusController extends Controller
{
    public function mainMenuePages(){  
        $pages = Page::where('is_active','1')->get();
$categories = MainCategory::where([['is_active','1']])->get();

        return view('admin.cuba.menus.main', compact('pages','categories'));
    }

    public function upadteMainMenuePages(Request $request){  
        $pages_arr = $request->pages;
        $cat_arr = $request->cat;
        // dd($pages_arr);
       Page::whereIn('id',$pages_arr)->update(array('show_in_navbar' => '1'));
       Page::whereNotIn('id',$pages_arr)->update(array('show_in_navbar' => '0'));

       MainCategory::whereIn('id',$cat_arr)->update(array('show_in_navbar' => '1'));
       MainCategory::whereNotIn('id',$cat_arr)->update(array('show_in_navbar' => '0'));

       
        return redirect()->back();
    }

    public function upadteSideMenuePages(Request $request){  
        $pages_arr = $request->pages;
        $cat_arr = $request->cat;

        // dd($pages_arr);
       Page::whereIn('id',$pages_arr)->update(array('show_in_sidebar' => '1'));
       Page::whereNotIn('id',$pages_arr)->update(array('show_in_sidebar' => '0'));

       MainCategory::whereIn('id',$cat_arr)->update(array('show_in_sidebar' => '1'));
       MainCategory::whereNotIn('id',$cat_arr)->update(array('show_in_sidebar' => '0'));
        return redirect()->back();
    }
    public function upadteFooterMenuePages(Request $request){  
        $pages_arr = $request->pages;
        $cat_arr = $request->cat;

        // dd($pages_arr);
       Page::whereIn('id',$pages_arr)->update(array('show_in_footer' => '1'));
       Page::whereNotIn('id',$pages_arr)->update(array('show_in_footer' => '0'));

       MainCategory::whereIn('id',$cat_arr)->update(array('show_in_footer' => '1'));
       MainCategory::whereNotIn('id',$cat_arr)->update(array('show_in_footer' => '0'));
        return redirect()->back();
    }
    
} // end of controller
