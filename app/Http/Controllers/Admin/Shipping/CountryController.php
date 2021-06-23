<?php

namespace App\Http\Controllers\Admin\Shipping;

use App\Http\Controllers\Controller;
use App\Models\Shipping\Countries\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function __construct()
    {
//        $this -> middleware(['permission:countries_read'])->only('index');
//        $this -> middleware(['permission:countries_create'])->only(['create', 'store']);
//        $this -> middleware(['permission:countries_update'])->only(['edit', 'update']);
//        $this -> middleware(['permission:countries_delete'])->only(['destroy']);
    } // end of construct

    public function index(Request $request)
    {
        $countries  = Country::when($request -> search , function ($query) use ($request) {
            return $query -> where('name', 'like', '%' . $request -> search . '%');
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

            if ($request -> image) {
                Image::make($request->image)->resize(100, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('/uploads/countries/'. $request ->image->hashName()));

                $request_data['image'] = $request->image->hashName();
            }

            Country::create($request_data);

            session()->flash('success', 'Country Added Successfully');
            return redirect()->route('admin.countries.index');

        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.countries.index');

        } // end of try -> catch

    }// end of store

    public function edit($id)
    {
        try {
            $country = Country::find($id);
            if(!$country) {
                session()->flash('error', "country Doesn't Exist or has been deleted");
                return redirect()->route('admin.countries.index');
            }

            return view('admin.cuba.shipping.countries.edit', compact('country'));

        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.countries.index');

        } // end of try -> catch

    } // end of edit

    public function update(Request $request, $id)
    {
        try {
            $country = Country::find($id);
            if(!$country) {
                session()->flash('error', "country Doesn't Exist or has been deleted");
                return redirect()->route('admin.countries.index');
            }

            $request_data = $request -> all();

            if($request->image){

                if ($country -> image != 'default.png') {

                    Storage::disk('public_uploads')->delete('/countries/' . $country ->image);

                } // end of inner if

                Image::make($request->image)->resize(100, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('/uploads/countries/'. $request ->image->hashName()));

                $request_data['image'] = $request->image->hashName();
            } // end of outer if

            $country->update($request_data);

            session()->flash('success', 'Country Updated Successfully');
            return redirect()->route('admin.countries.index');

        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.countries.index');

        } // end of try -> catch

    } // end of update

    public function destroy($id)
    {
        try {
            $country = Country::find($id);
            if(!$country) {
                session()->flash('error', "country Doesn't Exist or has been deleted");
                return redirect()->route('admin.countries.index');
            }

            if($country -> image != 'default.png'){
                Storage::disk('public_uploads')->delete('/countries/' . $country ->image);
            }

            $country -> deleteTranslations();
            $country -> delete();

            session()->flash('success', 'Country Deleted Successfully');
            return redirect()->route('admin.countries.index');

        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.countries.index');

        } // end of try -> catch

    } // end of destroy

} // end of controller
