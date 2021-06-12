<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\userResource;
use App\Models\User;


class UserController extends Controller
{
    //
    public function getUser($id){
        $user = User::where('id',$id)->with('vendor')->get();
        return response()->json(['success'=>'true','data'=>userResource::collection($user)]);
    }
}
