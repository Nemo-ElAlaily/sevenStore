<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pages\PageCreateRequest;
use App\Http\Requests\Pages\PageUpdateRequest;
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
//        $page = Page::find($id);
//        return view('admin.cuba.pages.show', compact('page'));
    } // end of create

    public function create()
    {
        return view('admin.cuba.pages.create');
    } // end of create

    public function store(PageCreateRequest $request)
    {
        if(!$request -> has('is_active')){
            $request -> request -> add(['is_active' => 0]);
        } else {
            $request -> request -> add(['is_active' => 1]);
        }

        if(!$request -> has('show_in_navbar')){
            $request -> request -> add(['show_in_navbar' => 0]);
        } else {
            $request -> request -> add(['show_in_navbar' => 1]);
        }

        if(!$request -> has('show_in_sidebar')){
            $request -> request -> add(['show_in_sidebar' => 0]);
        } else {
            $request -> request -> add(['show_in_sidebar' => 1]);
        }

        if(!$request -> has('show_in_footer')){
            $request -> request -> add(['show_in_footer' => 0]);
        } else {
            $request -> request -> add(['show_in_footer' => 1]);
        }

        $request_data = $request->except(['_token', '_method']);


        if($request_data['en']['title'] == 'admin' || $request_data['en']['slug'] == 'admin'){
            session()->flash('error', 'Page Title or Slug Can\'t be "admin"');
            return redirect()->back();
        } else {
            Page::create($request_data);
            session()->flash('success', 'Page Created Successfully');
            return redirect()->route('admin.pages.index');
        }

    } // end of store

    public function edit($id)
    {
        $page = Page::find($id);
        return view('admin.cuba.pages.edit', compact('page'));
    } // end of edit

    public function update(Request $request, $id)
    {
        $page = Page::find($id);

        if(!$request -> has('is_active')){
            $request -> request -> add(['is_active' => 0]);
        } else {
            $request -> request -> add(['is_active' => 1]);
        }

        if(!$request -> has('show_in_navbar')){
            $request -> request -> add(['show_in_navbar' => 0]);
        } else {
            $request -> request -> add(['show_in_navbar' => 1]);
        }

        if(!$request -> has('show_in_sidebar')){
            $request -> request -> add(['show_in_sidebar' => 0]);
        } else {
            $request -> request -> add(['show_in_sidebar' => 1]);
        }

        if(!$request -> has('show_in_footer')){
            $request -> request -> add(['show_in_footer' => 0]);
        } else {
            $request -> request -> add(['show_in_footer' => 1]);
        }

        $request_data = $request->except(['_token', '_method']);
        $page -> update($request_data);

        session()->flash('success', trans('validation.Updated Successfully'));
        return redirect()->route('admin.pages.index');

    } // end of update

    public function destroy($id)
    {
        $page = Page::find($id);
        $page->deleteTranslations();
        $page->delete();

        session()->flash('success', trans('validation.Deleted Successfully'));
        return redirect()->route('admin.pages.index');

    } // end of destroy

} // end of controller
