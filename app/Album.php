<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    //
    protected $fillable = ['title', 'image'];
    protected $hidden = ['id', 'created_at', 'updated_at'];
}
