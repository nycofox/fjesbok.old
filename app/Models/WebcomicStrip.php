<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebcomicStrip extends Model
{
    use HasFactory;

    public function source()
    {
        return $this->belongsTo(WebcomicSource::class);
    }
}
