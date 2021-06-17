<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pages\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::paginate(ADMIN_PAGINATION_COUNT);
        return view('admin.cuba.pages.index', compact('pages'));
    } // end of index

    public function show($id)
    {
        $page = Page::find($id);
        return view('admin.cuba.pages.show', compact('page'));
    } // end of create

    public function create()
    {
        $pages = Page::all();
        return $pages;
    } // end of create

    public function store()
    {
        $pages = Page::all();
        return $pages;
    } // end of store

    public function edit()
    {
        $pages = Page::all();
        return $pages;
    } // end of edit

    public function update()
    {
        $pages = Page::all();
        return $pages;
    } // end of update

    public function destroy()
    {
        $pages = Page::all();
        return $pages;
    } // end of destroy


} // end of controller
