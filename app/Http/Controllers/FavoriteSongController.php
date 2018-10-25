<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\FavoriteSong;
use \App\Song;

class FavoriteSongController extends Controller
{
    //
    public function addToFavorite(Request $request)
    {
        //don't add duplicate
        return response()->json(FavoriteSong::query()->firstOrCreate(['user_id' => auth()->user()->id, 'song_id' => $request['song_id']]));
    }

    public function deleteFavorite(FavoriteSong $song)
    {
        $song::query()->delete();
        return response()->json('deleted from favorites');
    }

    public function get_favorites()
    {
        $current_favorites = FavoriteSong::query()->where('user_id', auth()->user()->id)->orderBy('created_at', 'asc')->pluck('song_id')->toArray();
//        return $current_favorites;
        return response()->json(Song::query()->with('album')->whereIn('id', $current_favorites)->get());
    }

}
