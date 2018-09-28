<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Image;
use Illuminate\Support\Facades\Auth;

class ImageController extends Controller
{

    public function create(Request $request)
    {
        $filename = \Storage::put(Image::getImageDir(), $request->file('pic'));
        Image::create([
            'link'    => $filename,
            'user_id' => auth()->id()
        ]);

        return response()->json(['message' => 'Misha petuh']);
    }

    public function all() //only admin
    {
        $this->authorize('index', User::class);
        return response()->json(Image::orderBy('user_id', 'asc')->get());
    }

    public function imagesForCurrent()
    {
        return response()->json(Image::where('user_id', auth()->user()->id)->get());
    }

    public function updateImage(Image $image, Request $request)
    {
        return response()->json($image->update($request->all()));
    }


    public function deleteImage(Image $image)
    {
        return response()->json($image->delete());
    }
}
