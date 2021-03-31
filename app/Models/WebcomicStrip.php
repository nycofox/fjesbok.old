<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class WebcomicStrip extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    /**
     * A Strip belongs to a Webcomic Source
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function source(): BelongsTo
    {
        return $this->belongsTo(WebcomicSource::class);
    }
}
