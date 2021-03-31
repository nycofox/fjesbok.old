<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebcomicSource extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function webcomic()
    {
        return $this->belongsTo(Webcomic::class);
    }

    public function strips()
    {
        return $this->hasMany(WebcomicStrip::class);
    }

    public function getLanguageAttribute()
    {
        return $this->locales()[$this->lang] ?? 'Unknown';
    }

    private function locales()
    {
        return [
            'nb' => 'Norwegian',
            'en' => 'English',
            'sv' => 'Swedish'
        ];
    }
}
