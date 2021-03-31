<?php

namespace App\Models;

use http\Client\Request;
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

    /**
     * A Media may belong to a user
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Generates a temporary URL to the media object, valid for one minute.
     *
     * @return string
     */
    public function getUrlAttribute()
    {
        return Storage::temporaryUrl($this->path, now()->addMinute());
    }

    /**
     * Store a new media file to the CDN
     *
     * @param $request
     * @param null $userid
     * @return Media
     */
    public static function storeRequest($request, $userid = null): Media
    {
        $path = $request->store('i/' . date('Y/m/d'));

        $media = Media::create([
            'filename_original' => $request->getClientOriginalName(),
            'path' => $path,
            'slug' => Str::random(12) . '.' . basename($request->getMimeType()),
            'type' => 'i',
            'hash' => md5_file($request->path()),
            'user_id' => $userid,
        ]);

        return $media;
    }

    public static function storeFromString($path, $string, $originalname = null, $userid = null): ?Media
    {
        $file = Storage::put($path, $string);

        if(!$file) {
            return null;
        }

        $media = Media::create([
            'filename_original' => $originalname,
            'path' => $path,
            'slug' => Str::random(12) . '.' . substr(strrchr($path,'.'),1),
            'type' => 'i',
            'hash' => md5($string),
            'user_id' => $userid,

        ]);

        return $media;
    }
}
