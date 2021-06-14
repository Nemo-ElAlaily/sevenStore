<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MainCategory;
use Illuminate\Http\Request;

class MainCategoryController extends Controller
{
    public function __construct()
    {
        $this -> middleware(['permission:main_categories_read'])->only('index');
        $this -> middleware(['permission:main_categories_create'])->only(['create', 'store']);
        $this -> middleware(['permission:main_categories_update'])->only(['edit', 'update']);
        $this -> middleware(['permission:main_categories_delete'])->only(['destroy']);
    } // end of construct

    public function index()
    {
        $main_categories = MainCategory::paginate(ADMIN_PAGINATION_COUNT);
        return view('admin.cuba.main_categories.index' , compact('main_categories'));
    } // end of index

    public function create()
    {

    } //end of create

    public function store($id, Request $request)
    {

    } //end of store

    public function show($id)
    {

    } //end of show

    public function edit($id)
    {

    } //end of edit

    public function update($id ,Request $request)
    {

    } //end of update

    public function destroy($id)
    {

    } //end of destroy

} // end of controller
