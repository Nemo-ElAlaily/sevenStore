<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MainCategory;
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

    public function index()
    {
        $main_categories = MainCategory::paginate(ADMIN_PAGINATION_COUNT);
        return view('admin.cuba.main_categories.index' , compact('main_categories'));
    } // end of index

    public function create()
    {
        try {
            return view('admin.cuba.main_categories.create');

        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.main_categories.index' );

        } // end of try & catch
    } //end of create

    public function store($id, Request $request)
    {
        try {
            DB::beginTransaction();

            $imagePath = "";
            if($request -> image){
                $imagePath = uploadImage('uploads/main_categories/' . Carbon::now()-> year . '/' . Carbon::now() -> month . '/',  $request -> image);
            } else {
                $imagePath = Carbon::now()-> year . '/' . Carbon::now() -> month . '/' . 'default.png';
            }

            $category =  MainCategory::create([
                'name' => $request -> name,
                'slug' => str_replace( [' ', '/'], '_', $request -> name),
                'parent_id' => $request -> parent_id,
                'image' => $imagePath,
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

            if(!$main_category){
                session()->flash('error', "Category ID Doesn't Exist or has been deleted");
                return redirect()->route('admin.main_categories.index');
            }

            return view('admin.cuba.main_categories.edit', compact('main_category'));

        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.main_categories.index');

        }

    } //end of edit

    public function update($id ,Request $request)
    {
        try {
            $main_category = MainCategory::find($id);

            if(!$main_category){
                session()->flash('error', "Product Doesn't Exist or has been deleted");
                return redirect()->route('admin.products.index');
            }

            DB::beginTransaction();

            $imagePath = "";
            if($request->image){
                if ($main_category -> image != 'default.png') {
                    Storage::disk('public_uploads')->delete('uploads/main_categories/' . $main_category -> image);
                } // end of inner if
                $imagePath = uploadImage('uploads/main_categories',  $request -> image);
            } else {
                $imagePath = $main_category -> image_path;
            }// end of outer if

            $main_category -> update([
                'name' => $request -> name,
                'slug' => str_replace( [' ', '/'], '_', $request -> name),
                'parent_id' => $request -> parent_id,
                'image' => $imagePath,
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
                Storage::disk('public_uploads')->delete('uploads/main_categories/' . $main_category -> image);
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
