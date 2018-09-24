<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;

class UserManipulateController extends Controller
{
    public function signup(Request $request)
    {
        return response()->json(User::query()->create($request->all()));
    }

    public function profile($id)
    {
        return response()->json(User::findOrFail($id));
    }

//    public function login()
//    {
////        return response()->json(User::whe);
//    }
}
