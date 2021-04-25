<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Album extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Returns the name of the album, generated if system albums (non-deletable)
     *
     * @return string
     */
    public function getTitleAttribute(): string
    {
        if($this->system) {
            switch ($this->system) {
                case "p":
                    return 'Profile pictures';
                case "t":
                    return 'Timeline pictures';
            }
        }

        return $this->name;
    }

    /**
     * A system album cannot be deleted
     *
     * @return bool
     */
    public function canBeDeleted(): bool
    {
        return !$this->system;
    }
}
