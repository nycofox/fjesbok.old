<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Media extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getUrlAttribute()
    {
        return Storage::temporaryUrl($this->path, now()->addMinute());
    }

    public static function store($media, $userid = null): Media
    {
        $path = $media->store('i/' . date('Y/m/d'));

        $media = Media::create([
            'filename_original' => $media->getClientOriginalName(),
            'path' => $path,
            'slug' => Str::random(12) . '.' . basename($media->getMimeType()),
            'type' => 'i',
            'hash' => md5_file($media->path()),
            'user_id' => $userid,

        ]);

        return $media;
    }
}
