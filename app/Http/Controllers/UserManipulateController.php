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

    public function profile()
    {
        return response()->json(User::findOrFail(auth()->user()->id));
    }

    public function all()
    {
        $this->authorize('index', User::class);

        return response()->json(User::query()
//            ->select(['name'])
            ->orderBy('id', 'asc')
//            ->where([
//                'email' => 'admin@admin.ru'
//            ])
            ->where('email', '!=', 'admin@admin.ru')
            ->get()
        );
    }

//    public function login()
//    {
////        return response()->json(User::whe);
//    }
}
