<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'link', 'user_id', 'pic'
    ];

    protected $hidden = ['link', 'updated_at'];
    protected $appends = [
        'url'
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function getUrlAttribute()
    {
        if ($this->link) {
            $path = env('APP_URL') === 'http://localhost:8000' ? 'http://fb445c7b.ngrok.io' : env('APP_URL');
            return $path . '/' . str_replace('public/', 'storage/', $this->link);
        }

        return null;
    }

    public static function getImageDir()
    {
        return 'public/pic';
    }
}
