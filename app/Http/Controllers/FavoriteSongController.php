<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\FavoriteSong;

class FavoriteSongController extends Controller
{
    //
    public function addToFavorite(Request $request)
    {
        return response()->json(FavoriteSong::query()->create($request->all()));
    }
}
