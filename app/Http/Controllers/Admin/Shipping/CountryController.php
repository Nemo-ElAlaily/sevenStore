<?php

namespace App\Http\Controllers\Admin\Shipping;

use App\Http\Controllers\Controller;
use App\Http\Requests\Country\CountryCreateRequest;
use App\Models\Shipping\Countries\Country;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CountryController extends Controller
{
    public function __construct()
    {
        $this -> middleware(['permission:countries_read'])->only('index');
        $this -> middleware(['permission:countries_create'])->only(['create', 'store']);
        $this -> middleware(['permission:countries_update'])->only(['edit', 'update']);
        $this -> middleware(['permission:countries_delete'])->only(['destroy']);
    } // end of construct

    public function index(Request $request)
    {
        $countries  = Country::when($request -> search , function ($query) use ($request) {
            return $query -> whereTranslationLike('name', '%' . $request -> search . '%');
        })->latest()->paginate(ADMIN_PAGINATION_COUNT);

        return view('admin.cuba.shipping.countries.index', compact('countries'));

    } // end of index

    public function create()
    {
        return view('admin.cuba.shipping.countries.create');

    }// end of create

    public function store(CountryCreateRequest $request)
    {
        try {
            $request_data = $request -> all();

            if($request -> flag){
                $request_data['flag'] = uploadImage('uploads/Countries/',  $request -> flag);
            } else {
                $request_data['flag'] = 'default.png';
            }

            Country::create($request_data);

            session()->flash('success', trans('validation.Added Successfully'));
            return redirect()->route('admin.countries.index');

        } catch (\Exception $exception) {

            session()->flash('error', trans('validation.contact admin'));
            return redirect()->route('admin.countries.index');

        } // end of try -> catch

    }// end of store

    public function edit($id)
    {
        try {
            $country = Country::find($id);
            if(!$country) {
                session()->flash('error', trans('validation.do not exists'));
                return redirect()->route('admin.countries.index');
            }

            return view('admin.cuba.shipping.countries.edit', compact('country'));

        } catch (\Exception $exception) {

            session()->flash('error', trans('validation.contact admin'));
            return redirect()->route('admin.countries.index');

        } // end of try -> catch

    } // end of edit

    public function update(Request $request, $id)
    {
        try {
            $country = Country::find($id);
            if(!$country) {
                session()->flash('error', trans('validation.do not exists'));
                return redirect()->route('admin.countries.index');
            }

            $request_data = $request -> all();

            if($request->flag){
                if ($country -> flag != 'default.png') {
                    Storage::disk('public_uploads')->delete('/countries/' . $country -> image);
                } // end of inner if
                $request_data['flag'] = uploadImage('uploads/countries/',  $request -> flag);
            } else {
                $request_data['flag'] = $country -> flag;
            }// end of outer if

            $country->update($request_data);

            session()->flash('success', trans('validation.Updated Successfully'));
            return redirect()->route('admin.countries.index');

        } catch (\Exception $exception) {

            session()->flash('error', trans('validation.contact admin'));
            return redirect()->route('admin.countries.index');

        } // end of try -> catch

    } // end of update

    public function destroy($id)
    {
        try {
            $country = Country::find($id);
            if(!$country) {
                session()->flash('error', trans('validation.do not exists'));
                return redirect()->route('admin.countries.index');
            }

            if($country -> flag != 'default.png'){
                Storage::disk('public_uploads')->delete('/countries/' . $country ->flag);
            }

            $country -> deleteTranslations();
            $country -> delete();

            session()->flash('success', trans('validation.Deleted Successfully'));
            return redirect()->route('admin.countries.index');

        } catch (\Exception $exception) {

            session()->flash('error', trans('validation.contact admin'));
            return redirect()->route('admin.countries.index');

        } // end of try -> catch

    } // end of destroy

} // end of controller
