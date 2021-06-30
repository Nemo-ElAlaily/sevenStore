<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\BlogCreateRequest;
use App\Models\Blogs\Blog;
use App\Models\Blogs\BlogTag;
use App\Models\Blogs\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
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

    public function index()
    {
        $blogs = Blog::paginate(ADMIN_PAGINATION_COUNT);
        return view('admin.cuba.blogs.index', compact('blogs'));
    } // end of index

    public function create()
    {
        $tags = Tag::all();
        return view('admin.cuba.blogs.create', compact('tags'));
    } // end of create

    public function store(BlogCreateRequest $request)
    {
        try {
            $tags = $request->get('tags');
            $request->has('is_active') ? $request->request->add(['is_active' => 1]) : $request->request->add(['is_active' => 0]);
            $request->has('show_in_homepage') ? $request->request->add(['show_in_homepage' => 1]) : $request->request->add(['show_in_homepage' => 0]);
            $request_data = $request->all();

            if ($request->image) {
                Image::make($request->image)->resize(1000, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('/uploads/blogs/' . $request->image->hashName()));

                $request_data['image'] = $request->image->hashName();
            }
            $blog = Blog::create($request_data);
            foreach ($tags as $tag_id) {
                BlogTag::create([
                    'tag_id' => $tag_id,
                    'blog_id' => $blog->id
                ]);
            }
            session()->flash('success', 'Blog Added Successfully');
            return redirect()->route('admin.blogs.index');
        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
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
            $blog_tags = $blog->tags->pluck('id')->toArray();
            if (!$blog) {
                session()->flash('error', "Blog Doesn't Exist or has been deleted");
                return redirect()->route('admin.blogs.index');
            }

            return view('admin.cuba.blogs.edit', compact('blog', 'tags', 'blog_tags'));
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
                session()->flash('error', "Blog Doesn't Exist or has been deleted");
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
            session()->flash('success', 'Blog Added Successfully');
            return redirect()->route('admin.blogs.index');
        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator ' . $exception->getMessage());
            return redirect()->route('admin.blogs.index');
        } // end of try -> catch


    } // end of update

    public function destroy($id)
    {
        try {
            $blog = Blog::find($id);
            if (!$blog) {
                session()->flash('error', "Blog Doesn't Exist or has been deleted");
                return redirect()->route('admin.agencies.index');
            }

            if ($blog->image != 'default.png') {
                Storage::disk('public_uploads')->delete('/blogs/' . $blog->image);
            }

            $blog->deleteTranslations();
            $blog->delete();

            session()->flash('success', 'Blog Deleted Successfully');
            return redirect()->route('admin.blogs.index');
        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.blogs.index');
        } // end of try -> catch
    } // end of destroy

} // end of controller
