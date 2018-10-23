<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    //
    protected $fillable = ['name', 'artist', 'album_id', 'youtubeId', 'duration', 'year'];
//    protected $with = ['album'];  тоже можно

    public function album()
    {
        return $this->belongsTo(Album::class);
    }
}
