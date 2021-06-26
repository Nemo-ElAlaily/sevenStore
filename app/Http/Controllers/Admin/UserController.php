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


class UserController extends Controller
{
    public function __construct()
    {
        $this -> middleware(['permission:users_read'])->only('index');
        $this -> middleware(['permission:users_create'])->only(['create', 'store']);
        $this -> middleware(['permission:users_update'])->only(['edit', 'update']);
        $this -> middleware(['permission:users_delete'])->only(['destroy']);
    } // end of construct

    public function index(Request $request)
    {
        $roles = Role::where(['name' => 'admin'])->orWhere(['name' => 'shop_manager'])->orWhere(['name' => 'moderator'])->get();

        $users = User::whereRoleIs(['admin', 'shop_manager', 'moderator'])-> where(function($query) use ($request){
            return $query -> when($request-> search , function ($searchQuery) use ($request) {
                return $searchQuery -> where ('first_name', 'like' , '%' . $request -> search . '%')
                    ->orWhere('last_name', 'like' , '%' . $request -> search . '%')
                    ->orWhere('email', 'like' , '%' . $request -> search . '%');
            })->when($request -> role , function($query) use ($request) {
                return $query -> whereRoleIs($request -> role);
            });
        })->paginate(ADMIN_PAGINATION_COUNT);

        return view('admin.cuba.users.index', compact('users', 'roles'));
    } // end of index

    public function create()
    {
        try{
            if(Auth::user()->hasPermission('users_create')){
                return view('admin.cuba.users.create');
            } else {
                session() -> flash('error', 'Not Authorized, Please contact Administrator');
                return redirect()-> route('admin.users.index');
            }
        } catch (\Exception $exception) {
            session() -> flash('error', 'Something went wrong Please contact Administrator');
            return redirect()-> route('admin.users.index');
        }

    } // end of create

    public function store(Request $request)
    {
        $request -> validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users',
            'avatar' => 'mimes:jpg,jpeg,png,svg',
            'password' => 'required|confirmed',
            'role' => 'required',
        ]);

        try {
            $request_data = $request -> except(['password', 'password_confirmation', 'role', 'avatar']);

            DB::beginTransaction();

                $request_data['password'] = bcrypt($request->password);

                if($request -> avatar){
                    $avatarPath = uploadImage('uploads/users',  $request -> avatar);
                } else {
                    $avatarPath = 'default.png';
                }

                $user = User::create($request_data); // create user
                $user -> attachRole($request -> role); // add role to user

                if($request -> role == 'vendor'){
                    $vendor = Vendor::create([
                        'user_id' => $user -> id,
                        'billing_first_name' => $user -> first_name,
                        'billing_last_name' => $user -> last_name,
                        'billing_email' => $user -> email,
                        'can_sell_products' => 1,
                        'can_add_products' => 1,
                    ]);

                    DB::commit();

                    session()->flash('success', 'User Created Successfully, Please Complete Vendor\'s data');
                    return redirect()->route('admin.vendors.edit', $vendor -> id );
                }

            DB::commit();

            session()->flash('success', 'User Created Successfully');
            return redirect()->route('admin.users.index');

        } catch (\Exception $exception) {

            DB::rollback();
            session() -> flash('error', 'Something went wrong Please contact Administrator');
            return redirect()-> route('admin.users.index');
        }

    } // end of store

    public function edit(User $user)
    {
        try{
            if(Auth::user()->hasPermission('users_update')){
                return view('admin.cuba.users.edit', compact('user'));
            } else {
                session() -> flash('error', 'Not Authorized, Please contact Administrator');
                return redirect()-> route('admin.users.index');
            }
        } catch (\Exception $exception) {
            session() -> flash('error', 'Something went wrong Please contact Administrator');
            return redirect()-> route('admin.users.index');
        }

    } // end of edit

    public function update(Request $request, User $user)
    {
        try {
            $request -> validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => ['required', Rule::unique('users')->ignore($user -> id) ],
                'avatar' => 'image',
                'role' => 'required'
            ]);

            DB::beginTransaction();

                $request_data = $request -> except(['role', 'avatar']);

                if($request->avatar){
                    if ($user->avatar != 'default.png') {
                        Storage::disk('public_uploads')->delete('/users/' . $user ->avatar);
                    } // end of inner if

                    $request_data['avatar'] = uploadImage('uploads/users',  $request -> avatar);
                } else {
                    $request_data['avatar']  = 'default.png';

                } // end of outer if


                $user->update($request_data); // update user
                $user -> detachRole($user -> roles[0] -> id); // remove current role
                $user -> attachRole($request -> role); // update Role to user

            DB::commit();

            session()->flash('success', 'User Updated Successfully');
            return redirect()->route('admin.users.index');

        } catch (\Exception $exception) {

            DB::rollback();
            session() -> flash('error', 'Something went wrong Please contact Administrator');
            return redirect()-> route('admin.users.index');
        }

    } // end of update

    public function destroy(User $user)
    {
        if($user -> avatar != 'default.png'){
            Storage::disk('public_uploads')->delete('/users/' . $user -> avatar);
        }
        $user -> delete();
        session()->flash('success', 'User Deleted Successfully');
        return redirect()->route('admin.users.index');

    } // end of destroy

} // end of controller
