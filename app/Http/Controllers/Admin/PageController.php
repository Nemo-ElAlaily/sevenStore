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
        $page = Page::find($id);
        return view('admin.cuba.pages.show', compact('page'));
    } // end of create

    public function create()
    {
        return view('admin.cuba.pages.create');
    } // end of create

    public function store(PageCreateRequest $request)
    {
        $request_data = $request->except(['_token', '_method']);
        Page::create($request_data);

        session()->flash('success', 'Page Created Successfully');
        return redirect()->route('admin.pages.index');
    } // end of store

    public function edit($id)
    {
        $page = Page::find($id);
        return view('admin.cuba.pages.edit', compact('page'));
    } // end of edit

    public function update(PageUpdateRequest $request, $id)
    {
        $page = Page::find($id);
        $request_data = $request->except(['_token', '_method']);
        $page -> update($request_data);

        session()->flash('success', 'Page Updated Successfully');
        return redirect()->route('admin.pages.index');

    } // end of update

    public function destroy($id)
    {
        $page = Page::find($id);
        $page->deleteTranslations();
        $page->delete();

        session()->flash('success', 'Page Deleted Successfully');
        return redirect()->route('admin.pages.index');

    } // end of destroy
    
} // end of controller
