<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.cuba.index');

    }// end of index

} // end of controller
