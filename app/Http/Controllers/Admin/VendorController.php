<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Laratrust\Role;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class VendorController extends Controller
{
    public function __construct()
    {
        $this -> middleware(['permission:vendors_read'])->only('index');
        $this -> middleware(['permission:vendors_create'])->only(['create', 'store']);
        $this -> middleware(['permission:vendors_update'])->only(['edit', 'update']);
        $this -> middleware(['permission:vendors_delete'])->only(['destroy']);
    } // end of construct

    public function index(Request $request)
    {
        $vendors = Vendor::where(function($query) use ($request){
            return $query -> when($request-> search , function ($searchQuery) use ($request) {
                return $searchQuery -> where ('billing_first_name', 'like' , '%' . $request -> search . '%')
                    ->orWhere('billing_last_name', 'like' , '%' . $request -> search . '%')
                    ->orWhere('billing_email', 'like' , '%' . $request -> search . '%');
            });
        })->paginate(ADMIN_PAGINATION_COUNT);

        return view('admin.vendors.index', compact('vendors'));

    } // end of index

    public function edit(Vendor $vendor)
    {
        try{
            if(Auth::user()->hasPermission('vendors_update')){
                return view('admin.vendors.edit', compact('vendor'));
            } else {
                session() -> flash('error', 'Not Authorized, Please contact Administrator');
                return redirect() -> route('admin.vendors.index');
            }
        } catch (\Exception $exception) {
            session() -> flash('error', 'Something went wrong Please contact Administrator');
            return redirect()-> route('admin.vendors.index');
        }

    } // end of edit

    public function update(Request $request, Vendor $vendor)
    {
        try {

            DB::beginTransaction();

                if(!$request -> has('can_sell_products')){
                    $request -> request -> add(['can_sell_products' => 0]);
                } else {
                    $request -> request -> add(['can_sell_products' => 1]);
                }

                if(!$request -> has('can_add_products')){
                    $request -> request -> add(['can_add_products' => 0]);
                } else {
                    $request -> request -> add(['can_add_products' => 1]);
                }

                $vendor->update($request -> except(['_token', '_method'])); // update user

            DB::commit();

            session()->flash('success', 'Vendor Updated Successfully');
            return redirect()->route('admin.vendors.index');

        } catch (\Exception $exception) {

            DB::rollback();
            session() -> flash('error', 'Something went wrong Please contact Administrator');
            return redirect()-> route('admin.vendors.index');
        }

    } // end of update

} // end of controller
