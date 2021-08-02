<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\BlogCreateRequest;
use App\Models\Blogs\Blog;
use App\Models\Blogs\BlogTag;
use App\Models\MainCategories\MainCategory;
use App\Models\Tags\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:blogs_read'])->only('index');
        $this->middleware(['permission:blogs_create'])->only(['create', 'store']);
        $this->middleware(['permission:blogs_update'])->only(['edit', 'update']);
        $this->middleware(['permission:blogs_delete'])->only(['destroy']);
    } // end of construct

    public function index(Request $request)
    {
        $blogs = Blog::with('tags')->when($request -> search , function ($query) use ($request) {
            return $query -> whereTranslationLike('title', '%' . $request -> search . '%');
        })->latest()->paginate(ADMIN_PAGINATION_COUNT);

        return view('admin.cuba.blogs.index', compact('blogs'));
    } // end of index

    public function create()
    {
        $user = Auth::user()->id;

        $tags = Tag::all();
        $categories = MainCategory::all();
        return view('admin.cuba.blogs.create', compact('tags', 'categories', 'user'));
    } // end of create

    public function store(BlogCreateRequest $request)
    {
        $characters = array(' ', '/', '!', '\\');

        try {

            $request->has('is_active') ? $request->request->add(['is_active' => 1]) : $request->request->add(['is_active' => 0]);
            $request->has('show_in_homepage') ? $request->request->add(['show_in_homepage' => 1]) : $request->request->add(['show_in_homepage' => 0]);

            $request_data = $request -> except(['_token', '_method', 'image']);

            $request_data['ar']['slug'] = str_replace($characters, '-' , $request['ar']['title']);
            $request_data['en']['slug'] = str_replace($characters, '-' , $request['en']['title']);

            if ($request->image) {
                $image_path = uploadImage('uploads/blogs/' . Carbon::now() -> year . '/' . Carbon::now() -> month . '/' ,  $request -> image);
                $request_data['image'] = Carbon::now() -> year . '/' . Carbon::now() -> month . '/' . $image_path;
            } else {
                $request_data['image'] = 'default.png';
            }

            $blog = Blog::create($request_data);

            session()->flash('success', trans('validation.Added Successfully'));
            return redirect()->route('admin.blogs.index');

        } catch (\Exception $exception) {

            session()->flash('error', trans('validation.contact admin'));
            return redirect()->route('admin.blogs.index');
        } // end of try -> catch

    } // end of store

    public function show(Blog $blog)
    {
        //
    } // end of show


    public function edit($id)
    {
        try {
            $tags = Tag::all();
            $blog = Blog::find($id);
            $categories = MainCategory::all();
            $blog_tags = $blog->tags->pluck('id')->toArray();
            if (!$blog) {
                session()->flash('error', trans('validation.do not exists'));
                return redirect()->route('admin.blogs.index');
            }

            return view('admin.cuba.blogs.edit', compact('blog', 'tags', 'blog_tags', 'categories'));
        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator, ' . $exception->getMessage());
            return redirect()->route('admin.blogs.index');
        } // end of try -> catch

    } // end of edit

    public function update(Request $request, $id)
    {
        try {
            $new_tags = $request->get('tags');
            $request->has('is_active') ? $request->request->add(['is_active' => 1]) : $request->request->add(['is_active' => 0]);
            $request->has('show_in_homepage') ? $request->request->add(['show_in_homepage' => 1]) : $request->request->add(['show_in_homepage' => 0]);

            $blog = Blog::find($id);
            if (!$blog) {
                session()->flash('error', trans('validation.do not exists'));
                return redirect()->route('admin.blogs.index');
            }

            $request_data = $request->except(['image']);

            if($request->image){
                if ($blog -> image != 'default.png') {
                    Storage::disk('public_uploads')->delete('/blogs/' . $blog -> image);
                } // end of inner if
                $request_data['image'] = uploadImage('uploads/blogs/' . Carbon::now() -> year . '/' . Carbon::now() -> month . '/' ,  $request -> image);
            } else {
                $request_data['image'] = $blog -> image;
            }// end of outer if

            if (count($blog->tags) > 0) {
                BlogTag::where('blog_id', $blog->id)->delete();
            }
            if (!is_null($new_tags) && count($new_tags) > 0) {
                foreach ($new_tags as $tag_id) {
                    BlogTag::create([
                        'tag_id' => $tag_id,
                        'blog_id' => $blog->id
                    ]);
                }
            }

            $blog->update($request_data);
            session()->flash('success', trans('validation.Updated Successfully'));
            return redirect()->route('admin.blogs.index');
        } catch (\Exception $exception) {

            session()->flash('error', trans('validation.contact admin'));
            return redirect()->route('admin.blogs.index');
        } // end of try -> catch


    } // end of update

    public function destroy($id)
    {
        try {
            $blog = Blog::find($id);
            if (!$blog) {
                session()->flash('error', trans('validation.do not exists'));
                return redirect()->route('admin.agencies.index');
            }

            if ($blog->image != 'default.png') {
                Storage::disk('public_uploads')->delete('/blogs/' . $blog->image);
            }

            $blog->deleteTranslations();
            $blog->delete();

            session()->flash('success', trans('validation.Deleted Successfully'));
            return redirect()->route('admin.blogs.index');
        } catch (\Exception $exception) {

            session()->flash('error', trans('validation.contact admin'));
            return redirect()->route('admin.blogs.index');
        } // end of try -> catch
    } // end of destroy

} // end of controller
