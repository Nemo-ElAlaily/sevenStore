<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pages\Page;
use App\Models\Sliders\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::paginate(ADMIN_PAGINATION_COUNT);
        return view('admin.cuba.sliders.index', compact('sliders'));    } // end of index

    public function create()
    {
        return view('admin.cuba.sliders.create');
    } // end of create

    public function store(Request $request)
    {
        $request -> validator([
            'image' => 'required|mimes'
        ]);

        if(!$request -> has('is_active')){
            $request -> request -> add(['is_active' => 0]);
        } else {
            $request -> request -> add(['is_active' => 1]);
        }

        $request_data = $request->except(['_token', '_method']);

        $image_path = "";
        if($request -> image){
            $image_path = uploadImage('uploads/sliders/' . Carbon::now() -> year . '/' . Carbon::now() -> month . '/' ,  $request -> image);
            $request_data['image'] = Carbon::now() -> year . '/' . Carbon::now() -> month . '/' . $image_path;
        } else {
            $request_data['image'] = 'default.png';
        }

        Slider::create($request_data);

        session()->flash('success', trans('validation.Added Successfully'));
        return redirect()->route('admin.sliders.index');

    } // end of store

    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('admin.cuba.sliders.edit', compact('slider'));
    } // end of edit

    public function update(Request $request, $id)
    {
        $slider = Slider::find($id);

        if(!$request -> has('is_active')){
            $request -> request -> add(['is_active' => 0]);
        } else {
            $request -> request -> add(['is_active' => 1]);
        }

        $request_data = $request->except(['_token', '_method']);

        $imagePath = "";
        if($request -> image){
            if ($slider -> image != 'default.png') {
                Storage::disk('public_uploads')->delete('/sliders/' . $page -> image);
                $image_path = uploadImage('uploads/sliders/' . Carbon::now() -> year . '/' . Carbon::now() -> month . '/' ,  $request -> image);
                $request_data['image'] = Carbon::now() -> year . '/' . Carbon::now() -> month . '/' . $image_path;
            } // end of inner if

        } else {
            $request_data['image'] = $slider -> image;
        }// end of outer if

        $slider -> update($request_data);

        session()->flash('success', trans('validation.Updated Successfully'));
        return redirect()->route('admin.sliders.index');

    } // end of update

    public function destroy($id)
    {
        $slider = Slider::find($id);

        if ($slider -> image != 'default.png') {
            Storage::disk('public_uploads')->delete('sliders/' . $slider -> image);
        }
        $slider->deleteTranslations();
        $slider->delete();

        session()->flash('success', trans('validation.Deleted Successfully'));
        return redirect()->route('admin.sliders.index');

    } // end of destroy

} // end of controller
