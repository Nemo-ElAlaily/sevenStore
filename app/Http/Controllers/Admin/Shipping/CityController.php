<?php

namespace App\Http\Controllers\Admin\Shipping;

use App\Http\Controllers\Controller;
use App\Http\Requests\City\CityCreateRequest;
use App\Models\Shipping\Cities\City;
use App\Models\Shipping\Countries\Country;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function __construct()
    {
        $this -> middleware(['permission:cities_read'])->only('index');
        $this -> middleware(['permission:cities_create'])->only(['create', 'store']);
        $this -> middleware(['permission:cities_update'])->only(['edit', 'update']);
        $this -> middleware(['permission:cities_delete'])->only(['destroy']);
    } // end of construct

    public function index(Request $request)
    {
        $cities  = City::when($request -> search , function ($query) use ($request) {
            return $query -> whereTranslationLike('name', '%' . $request -> search . '%');
        })->latest()->paginate(ADMIN_PAGINATION_COUNT);

        return view('admin.cuba.shipping.cities.index', compact('cities'));

    } // end of index

    public function create()
    {
        $countries = Country::all();
        return view('admin.cuba.shipping.cities.create', compact('countries'));

    }// end of create

    public function store(CityCreateRequest $request)
    {
        try {
            $request_data = $request -> all();

            City::create($request_data);

            session()->flash('success', trans('validation.Added Successfully'));
            return redirect()->route('admin.cities.index');

        } catch (\Exception $exception) {

            session()->flash('error', trans('validation.contact admin'));
            return redirect()->route('admin.cities.index');

        } // end of try -> catch

    }// end of store

    public function edit($id)
    {
        try {
            $city = City::find($id);
            if(!$city) {
                session()->flash('error', trans('validation.do not exists'));
                return redirect()->route('admin.cities.index');
            }
            $countries = Country::all();
            return view('admin.cuba.shipping.cities.edit', compact( 'countries','city'));

        } catch (\Exception $exception) {

            session()->flash('error', trans('validation.contact admin'));
            return redirect()->route('admin.cities.index');

        } // end of try -> catch

    } // end of edit

    public function update(Request $request, $id)
    {
        try {
            $city = City::find($id);

            if(!$city) {
                session()->flash('error', trans('validation.do not exists'));
                return redirect()->route('admin.cities.index');
            }

            $request_data = $request -> all();

            $city->update($request_data);

            session()->flash('success', trans('validation.Updated Successfully'));
            return redirect()->route('admin.cities.index');

        } catch (\Exception $exception) {

            session()->flash('error', trans('validation.contact admin'));
            return redirect()->route('admin.cities.index');

        } // end of try -> catch

    } // end of update

    public function destroy($id)
    {
        try {
            $city = City::find($id);

            if(!$city) {
                session()->flash('error', trans('validation.do not exists'));
                return redirect()->route('admin.cities.index');
            }

            $city -> deleteTranslations();
            $city -> delete();

            session()->flash('success', trans('validation.Deleted Successfully'));
            return redirect()->route('admin.cities.index');

        } catch (\Exception $exception) {

            session()->flash('error', trans('validation.contact admin'));
            return redirect()->route('admin.cities.index');

        } // end of try -> catch

    } // end of destroy

} // end of controller
