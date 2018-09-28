<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth;

class Image extends Model
{
    //
    protected $fillable = [
        'link', 'user_id'
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
