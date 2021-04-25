<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WebcomicSource extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'last_scraped_at' => 'datetime',
    ];

    public function webcomic(): BelongsTo
    {
        return $this->belongsTo(Webcomic::class);
    }

    public function strips(): HasMany
    {
        return $this->hasMany(WebcomicStrip::class);
    }

    public function getLanguageAttribute(): string
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
