<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pages\PageCreateRequest;
use App\Http\Requests\Pages\PageUpdateRequest;
use App\Models\Pages\Page;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        $image_path = "";
        if($request -> image){
            $image_path = uploadImage('uploads/pages/images/' . Carbon::now() -> year . '/' . Carbon::now() -> month . '/' ,  $request -> image);
            $request_data['image'] = Carbon::now() -> year . '/' . Carbon::now() -> month . '/' . $image_path;
        } else {
            $request_data['image'] = 'default.png';
        }

        $banner = "";
        if($request -> banner){
            $banner = uploadImage('uploads/pages/banners/' . Carbon::now() -> year . '/' . Carbon::now() -> month . '/' ,  $request -> banner);
            $request_data['banner'] = Carbon::now() -> year . '/' . Carbon::now() -> month . '/' . $banner;
        } else {
            $request_data['banner'] = 'default.png';
        }

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

        $imagePath = "";
        if($request -> image){
            if ($page -> image != 'default.png') {
                Storage::disk('public_uploads')->delete('/pages/images/' . $page -> image);
                $image_path = uploadImage('uploads/pages/images/' . Carbon::now() -> year . '/' . Carbon::now() -> month . '/' ,  $request -> image);
                $request_data['image'] = Carbon::now() -> year . '/' . Carbon::now() -> month . '/' . $image_path;
            } // end of inner if

        } else {
            $request_data['image'] = $page -> image;
        }// end of outer if

        $banner = "";
        if($request -> banner){
            if ($page -> banner != 'default.png') {
                Storage::disk('public_uploads')->delete('/pages/banners/' . $page -> banner);
                $banner = uploadImage('uploads/pages/images/' . Carbon::now() -> year . '/' . Carbon::now() -> month . '/' ,  $request -> image);
                $request_data['banner'] = Carbon::now() -> year . '/' . Carbon::now() -> month . '/' . $banner;
            } // end of inner if

        } else {
            $request_data['banner'] = $page -> banner;
        }// end of outer if

        $page -> update($request_data);

        session()->flash('success', trans('validation.Updated Successfully'));
        return redirect()->route('admin.pages.index');

    } // end of update

    public function destroy($id)
    {
        $page = Page::find($id);

        if ($page -> image != 'default.png') {
            Storage::disk('public_uploads')->delete('pages/images/' . $page -> image);
        }

        if ($page -> banner != 'default.png') {
            Storage::disk('public_uploads')->delete('pages/banners/' . $page -> banner);
        }

        $page->deleteTranslations();
        $page->delete();

        session()->flash('success', trans('validation.Deleted Successfully'));
        return redirect()->route('admin.pages.index');

    } // end of destroy

} // end of controller
