<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FavoriteSong extends Model
{
    //
    public $table = "favorite_list";
    protected $fillable = ['song_id'];
    protected $hidden = ['id', 'created_at', 'updated_at'];

    public function album()
    {
        return $this->belongsTo(Album::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($song) { //auto save id if auth
            $song->user_id = auth()->user()->id;

        });
    }
}
