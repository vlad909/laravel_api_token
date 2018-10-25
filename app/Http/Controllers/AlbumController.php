<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Album;

class AlbumController extends Controller
{
    //
    public function add(Request $request)
    {
        return response()->json(Album::query()->firstOrCreate(['image' => $request['image']]));
    }

    public function updateAlbuum(Album $album, Request $request)
    {
        return response()->json($album->update($request->all()));
    }

    public function listAlbums()
    {
        return response()->json(Album::query()->get());
    }
}
