<?php

namespace App\Models;

use App\Traits\HasComments;
use App\Traits\HasVotes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Multicaret\Acquaintances\Traits\CanBeFavorited;
use Multicaret\Acquaintances\Traits\CanBeLiked;
use Multicaret\Acquaintances\Traits\CanBeVoted;

class Post extends Model
{
    use HasFactory, SoftDeletes, HasComments, HasVotes;
//    use CanBeLiked, CanBeFavorited, CanBeVoted;

    protected $guarded = [];

    protected $with = ['user', 'media'];

    protected $withCount = ['comments'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'last_edited_at' => 'datetime',
    ];

    /**
     * A Post belongs to a User
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * A Post may have Media
     *
     * @return BelongsTo
     */
    public function media(): BelongsTo
    {
        return $this->belongsTo(Media::class);
    }
}
