<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tags\CreateTagReqeust;
use App\Models\Blogs\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:tags_read'])->only('index');
        $this->middleware(['permission:tags_create'])->only(['create', 'store']);
        $this->middleware(['permission:tags_update'])->only(['edit', 'update']);
        $this->middleware(['permission:tags_delete'])->only(['destroy']);
    }

    public function index(Request $request)
    {
        $tags = Tag::when($request->search, function ($query) use ($request) {
            return $query->whereTranslationLike('name',    '%' . $request->search . '%');
        })->latest()->paginate(ADMIN_PAGINATION_COUNT);
        return view('admin.cuba.tags.index', compact('tags'));
    } // end of index

    public function create()
    {
        return view('admin.cuba.tags.create');
    } // end of create
    public function store(CreateTagReqeust $request)
    {
        try {
            $request->has('is_active') ? $request->request->add(['is_active' => 1]) : $request->request->add(['is_active' => 0]);
            $request->has('is_popular_tag') ? $request->request->add(['is_popular_tag' => 1]) : $request->request->add(['is_popular_tag' => 0]);

            $request_data = $request -> except(['_token', '_method']);

            Tag::create($request_data);
            session()->flash('success', 'Tag Added Successfully');
            return redirect()->route('admin.tags.index');

        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator' . $exception->getMessage());
            return redirect()->route('admin.tags.index');
        } // end of try -> catch

    } // end of store

    public function edit($id)
    {
        try {
            $tag = Tag::find($id);
            if (!$tag) {
                session()->flash('error', "Type Doesn't Exist or has been deleted");
                return redirect()->route('admin.tags.index');
            }
            return view('admin.cuba.tags.edit', compact('tag'));
        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.tags.index');
        } // end of try -> catch

    } // end of edit

    public function update(Request $request, $id)
    {
        try {
            $tag = Tag::find($id);
            if (!$tag) {
                session()->flash('error', "Type Doesn't Exist or has been deleted");
                return redirect()->route('admin.tags.index');
            }

            $request->has('is_active') ? $request->request->add(['is_active' => 1]) : $request->request->add(['is_active' => 0]);
            $request->has('is_popular_tag') ? $request->request->add(['is_popular_tag' => 1]) : $request->request->add(['is_popular_tag' => 0]);

            $tag->update($request->except(['_token', '_method']));

            session()->flash('success', 'Tag Updated Successfully');
            return redirect()->route('admin.tags.index');
        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.tags.index');
        } // end of try -> catch

    } // end of update

    public function destroy($id)
    {
        try {
            $tag = tag::find($id);
            if (!$tag) {
                session()->flash('error', "Type Doesn't Exist or has been deleted");
                return redirect()->route('admin.tags.index');
            }

            $tag->deleteTranslations();
            $tag->delete();

            session()->flash('success', 'Tag Deleted Successfully');
            return redirect()->route('admin.tags.index');
        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.tags.index');
        } // end of try -> catch

    } // end of destroy

} // end of controller
