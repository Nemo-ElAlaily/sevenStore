<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MainCategories\MainCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MainCategoryController extends Controller
{
    public function __construct()
    {
        $this -> middleware(['permission:main_categories_read'])->only('index');
        $this -> middleware(['permission:main_categories_create'])->only(['create', 'store']);
        $this -> middleware(['permission:main_categories_update'])->only(['edit', 'update']);
        $this -> middleware(['permission:main_categories_delete'])->only(['destroy']);
    } // end of construct

    public function index(Request $request)
    {
        $main_categories = MainCategory::when($request -> search , function ($query) use ($request) {
            return $query -> whereTranslationLike('name', '%' . $request -> search . '%');
        })->latest()->paginate(ADMIN_PAGINATION_COUNT);

        return view('admin.cuba.main_categories.index' , compact('main_categories'));
    } // end of index

    public function create()
    {
        try {
            $categories = MainCategory::all();
            return view('admin.cuba.main_categories.create',compact('categories'));

        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.main_categories.index' );

        } // end of try & catch
    } //end of create

    public function store( Request $request)
    {
        try {
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

            DB::beginTransaction();

            $imagePath = "";
            if($request -> image){
                $imagePath = uploadImage('uploads/main_categories/' . Carbon::now() -> year . '/' . Carbon::now() -> month . '/' ,  $request -> image);
            } else {
                $imagePath = 'default.png';
            }

            $category =  MainCategory::create([
                'name' => $request -> name,
                'slug' => str_replace( [' ', '/'], '_', $request -> name),
                'parent_id' => $request -> parent_id,
                'image' => $imagePath,
                'is_active' => $request -> is_active,
                'show_in_navbar' => $request -> show_in_navbar,
                'show_in_sidebar' => $request -> show_in_sidebar,
                'show_in_footer' => $request -> show_in_footer,
            ]);

            DB::commit();

            session()->flash('success', 'Category Added Successfully');
            return redirect()->route('admin.main_categories.index');

        } catch (\Exception $exception) {
            //return $exception;
            DB::rollback();
            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.main_categories.index');

        } // end of try & catch

    } //end of store

    public function show($id)
    {
        try {
            $main_category = MainCategory::find($id);

            if(!$main_category){
                session()->flash('error', "Category ID Doesn't Exist or has been deleted");
                return redirect()->route('admin.main_categories.index');
            }

            return view('admin.cuba.main_categories.show', compact('main_category'));

        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.main_categories.index');

        }

    } //end of show

    public function edit($id)
    {
        try {
            $main_category = MainCategory::find($id);
            $all_categories = MainCategory::all();

            if(!$main_category){
                session()->flash('error', "Category ID Doesn't Exist or has been deleted");
                return redirect()->route('admin.main_categories.index');
            }

            return view('admin.cuba.main_categories.edit', compact('main_category', 'all_categories'));

        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.main_categories.index');

        }

    } //end of edit

    public function update($id ,Request $request)
    {
        try {
            $main_category = MainCategory::find($id);

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

            if(!$main_category){
                session()->flash('error', "Category Doesn't Exist or has been deleted");
                return redirect()->route('admin.category.index');
            }

            DB::beginTransaction();

            $imagePath = "";
            if($request->image){
                if ($main_category -> image != 'default.png') {
                    Storage::disk('public_uploads')->delete('/main_categories/' . $main_category -> image);
                } // end of inner if
                $imagePath = uploadImage('uploads/main_categories' . Carbon::now() -> year . '/' . Carbon::now() -> month . '/' ,  $request -> image);
            } else {
                $imagePath = $main_category -> image_path;
            }// end of outer if

            $main_category -> update([
                'name' => $request -> name,
                'slug' => str_replace( [' ', '/'], '_', $request -> name),
                'parent_id' => $request -> parent_id,
                'image' => $imagePath,
                'is_active' => $request -> is_active,
                'show_in_navbar' => $request -> show_in_navbar,
                'show_in_sidebar' => $request -> show_in_sidebar,
                'show_in_footer' => $request -> show_in_footer,
            ]);

            DB::commit();

            session()->flash('success', 'Category Updated Successfully');
            return redirect()->route('admin.main_categories.index');

        } catch (\Exception $exception) {

            DB::rollback();
            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.main_categories.index');

        } // end of try & catch

    } //end of update

    public function destroy($id)
    {
        $main_category = MainCategory::find($id);

        if(!$main_category){
            session()->flash('error', "Category ID Doesn't Exist or has been deleted");
            return redirect()->route('admin.main_categories.index');
        }

        try {
            if ($main_category -> image != 'default.png') {
                Storage::disk('public_uploads')->delete('/main_categories/' . $main_category -> image);
            } // end of inner if

            $main_category -> delete();

            session()->flash('success', 'Category Deleted Successfully');
            return redirect()->route('admin.main_categories.index');

        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.main_categories.index');

        } // end of try & catch

    } //end of destroy

} // end of controller
