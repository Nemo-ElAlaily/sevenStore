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
        $this -> middleware(['permission:read_cities'])->only('index');
        $this -> middleware(['permission:create_cities'])->only(['create', 'store']);
        $this -> middleware(['permission:update_cities'])->only(['edit', 'update']);
        $this -> middleware(['permission:delete_cities'])->only(['destroy']);
    } // end of construct

    public function index(Request $request)
    {
        $cities  = City::when($request -> search , function ($query) use ($request) {
            return $query -> where('name', 'like', '%' . $request -> search . '%');
        })->latest()->paginate(PAGINATION_COUNT);

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

            session()->flash('success', 'City Added Successfully');
            return redirect()->route('admin.cities.index');

        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.cities.index');

        } // end of try -> catch

    }// end of store

    public function edit($id)
    {
        try {
            $city = City::find($id);
            if(!$city) {
                session()->flash('error', "City Doesn't Exist or has been deleted");
                return redirect()->route('admin.cities.index');
            }
            $countries = Country::all();
            return view('admin.cuba.shipping.cities.edit', compact( 'countries','city'));

        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.cities.index');

        } // end of try -> catch

    } // end of edit

    public function update(Request $request, $id)
    {
        try {
            $city = City::find($id);

            if(!$city) {
                session()->flash('error', "City Doesn't Exist or has been deleted");
                return redirect()->route('admin.cities.index');
            }

            $request_data = $request -> all();

            $city->update($request_data);

            session()->flash('success', 'City Updated Successfully');
            return redirect()->route('admin.cities.index');

        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.cities.index');

        } // end of try -> catch

    } // end of update

    public function destroy($id)
    {
        try {
            $city = City::find($id);

            if(!$city) {
                session()->flash('error', "City Doesn't Exist or has been deleted");
                return redirect()->route('admin.cities.index');
            }

            $city -> deleteTranslations();
            $city -> delete();

            session()->flash('success', 'City Deleted Successfully');
            return redirect()->route('admin.cities.index');

        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.cities.index');

        } // end of try -> catch

    } // end of destroy

} // end of controller
