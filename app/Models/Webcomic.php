<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Webcomic extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sources()
    {
        return $this->hasMany(WebcomicSource::class);
    }

    public function getLogoAttribute()
    {
        return asset('img/missing.jpg');
    }
}
