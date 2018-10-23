<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Album;

class AlbumController extends Controller
{
    //
    public function add(Request $request)
    {
        return response()->json(Album::query()->create($request->all()));
    }
}
