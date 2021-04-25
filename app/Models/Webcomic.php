<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Webcomic extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['media'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sources()
    {
        return $this->hasMany(WebcomicSource::class);
    }

    public function media()
    {
        return $this->belongsTo(Media::class);
    }

    public function getLogoUrlAttribute()
    {
        if ($this->media_id) {
            return $this->media->url;
        }

        return asset('img/missing.jpg');

    }
}
