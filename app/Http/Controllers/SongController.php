<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Song;

class SongController extends Controller
{
    //
    public function add_music(Request $request)
    {
        return response()->json(Song::query()->create($request->all()));
    }

    public function paginated_music()
    {
        return response()->json(Song::query()->with('album')->orderBy('id', 'asc')->paginate(5));
    }

}
