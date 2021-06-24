<?php

namespace App\Http\Controllers\Admin\Shipping;

use App\Http\Controllers\Controller;
use App\Models\Shipping\Cities\City;
use App\Models\Shipping\Regions\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function __construct()
    {
        $this -> middleware(['permission:regions_read'])->only('index');
        $this -> middleware(['permission:regions_create'])->only(['create', 'store']);
        $this -> middleware(['permission:regions_update'])->only(['edit', 'update']);
        $this -> middleware(['permission:regions_delete'])->only(['destroy']);
    } // end of construct

    public function index(Request $request)
    {
        $regions  = Region::when($request -> search , function ($query) use ($request) {
            return $query -> whereTranslationLike('name', '%' . $request -> search . '%');
        })->latest()->paginate(ADMIN_PAGINATION_COUNT);

        return view('admin.cuba.shipping.regions.index', compact('regions'));

    } // end of index

    public function create()
    {
        $cities = City::all();
        return view('admin.cuba.shipping.regions.create', compact('cities'));

    }// end of create

    public function store(Request $request)
    {
        try {
            $request_data = $request -> except(['_token', '_method']);

            Region::create($request_data);

            session()->flash('success', 'Region Added Successfully');
            return redirect()->route('admin.regions.index');

        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.regions.index');

        } // end of try -> catch

    }// end of store

    public function edit($id)
    {
        try {
            $region = Region::find($id);
            if(!$region) {
                session()->flash('error', "Region Doesn't Exist or has been deleted");
                return redirect()->route('admin.regions.index');
            }
            $cities = City::all();
            return view('admin.cuba.shipping.regions.edit', compact( 'cities','region'));

        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.regions.index');

        } // end of try -> catch

    } // end of edit

    public function update(Request $request, $id)
    {
        try {
            $region = Region::find($id);

            if(!$region) {
                session()->flash('error', "City Doesn't Exist or has been deleted");
                return redirect()->route('admin.regions.index');
            }

            $request_data = $request -> except(['_token', '_method']);

            $region->update($request_data);

            session()->flash('success', 'Region Updated Successfully');
            return redirect()->route('admin.regions.index');

        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.regions.index');

        } // end of try -> catch

    } // end of update

    public function destroy($id)
    {
        try {
            $region = Region::find($id);

            if(!$region) {
                session()->flash('error', "Region Doesn't Exist or has been deleted");
                return redirect()->route('admin.regions.index');
            }

            $region -> deleteTranslations();
            $region -> delete();

            session()->flash('success', 'Region Deleted Successfully');
            return redirect()->route('admin.regions.index');

        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.regions.index');

        } // end of try -> catch

    } // end of destroy
}
