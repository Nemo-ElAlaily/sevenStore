<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainCategories\MainCategoryCreateRequest;
use App\Http\Requests\MainCategories\MainCategoryUpdateRequest;
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

            session()->flash('error', trans('validation.contact admin'));
            return redirect()->route('admin.main_categories.index' );

        } // end of try & catch
    } //end of create

    public function store(MainCategoryCreateRequest $request)
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

            $request_data = $request -> except(['_token', '_method', 'image' , 'gallery']);


            DB::beginTransaction();

            $image_path = "";
            if($request -> image){
                $image_path = uploadImage('uploads/main_categories/' . '/' . Carbon::now() -> year . '/' . Carbon::now() -> month . '/' ,  $request -> image);
                $request_data['image'] = Carbon::now() -> year . '/' . Carbon::now() -> month . '/' .  $image_path;
            } else {
                $request_data['image'] = 'default.png';
            }

            $category =  MainCategory::create($request_data);

            DB::commit();

            session()->flash('success', trans('validation.Added Successfully'));
            return redirect()->route('admin.main_categories.index');

        } catch (\Exception $exception) {

            DB::rollback();
            session()->flash('error', trans('validation.contact admin'));
            return redirect()->route('admin.main_categories.index');

        } // end of try & catch

    } //end of store

    public function show($id)
    {
        try {
            $main_category = MainCategory::find($id);

            if(!$main_category){
                session()->flash('error', trans('validation.do not exists'));
                return redirect()->route('admin.main_categories.index');
            }

            return view('admin.cuba.main_categories.show', compact('main_category'));

        } catch (\Exception $exception) {

            session()->flash('error', trans('validation.contact admin'));
            return redirect()->route('admin.main_categories.index');

        }

    } //end of show

    public function edit($id)
    {
        try {
            $main_category = MainCategory::find($id);
            $all_categories = MainCategory::all();

            if(!$main_category){
                session()->flash('error', trans('validation.do not exists'));
                return redirect()->route('admin.main_categories.index');
            }

            return view('admin.cuba.main_categories.edit', compact('main_category', 'all_categories'));

        } catch (\Exception $exception) {

            session()->flash('error', trans('validation.contact admin'));
            return redirect()->route('admin.main_categories.index');

        }

    } //end of edit

    public function update($id ,MainCategoryUpdateRequest $request)
    {
        try {
            $main_category = MainCategory::find($id);

            if(!$main_category){
                session()->flash('error', trans('validation.do not exists'));
                return redirect()->route('admin.category.index');
            }

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

            $request_data = $request -> except(['_token', '_method', 'image' , 'gallery']);

            DB::beginTransaction();

            $image_path = "";
            if($request->image){
                if ($main_category -> image != 'default.png') {
                    Storage::disk('public_uploads')->delete('/main_categories/' . $main_category -> image);
                } // end of inner if
                $image_path = uploadImage('uploads/main_categories'. '/' . Carbon::now() -> year . '/' . Carbon::now() -> month . '/' ,  $request -> image);
                $request_data['image'] = Carbon::now() -> year . '/' . Carbon::now() -> month . '/' .  $image_path;
            } else {
                $request_data['image'] = $main_category -> image;
            }// end of outer if

            $main_category -> update($request_data);

            DB::commit();

            session()->flash('success', trans('validation.Updated Successfully'));
            return redirect()->route('admin.main_categories.index');

        } catch (\Exception $exception) {

            DB::rollback();
            session()->flash('error', trans('validation.contact admin'));
            return redirect()->route('admin.main_categories.index');

        } // end of try & catch

    } //end of update

    public function destroy($id)
    {
        $main_category = MainCategory::find($id);

        if(!$main_category){
            session()->flash('error', trans('validation.do not exists'));
            return redirect()->route('admin.main_categories.index');
        }

        try {
            if ($main_category -> image != 'default.png') {
                Storage::disk('public_uploads')->delete('/main_categories/' . $main_category -> image);
            } // end of inner if

            $main_category -> deleteTranslations();
            $main_category -> delete();

            session()->flash('success', trans('validation.Deleted Successfully'));
            return redirect()->route('admin.main_categories.index');

        } catch (\Exception $exception) {

            session()->flash('error', trans('validation.contact admin'));
            return redirect()->route('admin.main_categories.index');

        } // end of try & catch

    } //end of destroy

} // end of controller
