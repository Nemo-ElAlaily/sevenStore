<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Currency\CurrencyCreateRequest;
use App\Http\Requests\Currency\CurrencyUpdateRequest;
use App\Models\Currencies\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function __construct()
    {
        $this -> middleware(['permission:currencies_read'])->only('index');
        $this -> middleware(['permission:currencies_create'])->only(['create', 'store']);
        $this -> middleware(['permission:currencies_update'])->only(['edit', 'update']);
        $this -> middleware(['permission:currencies_delete'])->only(['destroy']);
    } // end of construct

    public function index(Request $request)
    {
        $currencies = Currency::when($request -> search , function ($query) use ($request) {
            return $query -> where('name', 'like', '%' . $request -> search . '%');
        })->latest()->paginate(ADMIN_PAGINATION_COUNT);

        return view('admin.cuba.currencies.index', compact('currencies'));

    } // end of index

    public function create()
    {
        return view('admin.cuba.currencies.create');

    } // end of create

    public function store(CurrencyCreateRequest $request)
    {
        try {
            Currency::create($request->all());

            session()->flash('success', 'Currency Added Successfully');
            return redirect()->route('admin.currencies.index');

        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.currencies.index');

        }

    } // end of store

    public function edit($id)
    {
        try {
            $currency =Currency::find($id);
            if(!$currency) {
                session()->flash('error', "Currency Doesn't Exist or has been deleted");
                return redirect()->route('admin.currencies.index');
            }
            return view('admin.cuba.currencies.edit', compact('currency'));

        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.currencies.index');


        } // end of try -> catch

    }// end of edit

    public function update(Request $request, $id)
    {
        try {
            $currency = Currency::find($id);
            if(!$currency) {
                session()->flash('error', "Currency Doesn't Exist or has been deleted");
                return redirect()->route('admin.currencies.index');
            }

            $currency -> update($request -> all());

            session()->flash('success', 'Currency Updated Successfully');
            return redirect()->route('admin.currencies.index');

        } catch (\Exception $exception ) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.currencies.index');

        } // end of try -> catch

    }// end of update

    public function destroy($id)
    {
        try {
            $currency = Currency::find($id);
            if(!$currency) {
                session()->flash('error', "Currency Doesn't Exist or has been deleted");
                return redirect()->route('admin.currencies.index');
            }

            $currency -> deleteTranslations();
            $currency -> delete();

            session()->flash('success', 'Currency Deleted Successfully');
            return redirect()->route('admin.currencies.index');

        } catch (\Exception $exception) {

            session()->flash('error', 'Something Went Wrong, Please Contact Administrator');
            return redirect()->route('admin.currencies.index');

        } // end of try -> catch

    } // end of destroy

} // end of controller
