<?php

namespace App\Traits;

use App\Models\User;
use App\Models\Vote;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasVotes
{
    /**
     * Get all of the models comments.
     */
    public function votes(): MorphMany
    {
        return $this->morphMany(Vote::class, 'voteable');
    }

    public function upvote($user = null)
    {
        $user = $user ?? auth()->user();

        if ($this->hasUpvoted($user)) {
            $this->decrement('score');
            $this->removevote($user);
        } elseif ($this->hasDownvoted($user)) {
            $this->increment('score', 2);
            $this->vote($user);
        } else {
            $this->increment('score');
            $this->vote($user);
        }
    }

    public function downvote($user = null)
    {
        $user = $user ?? auth()->user();

        if ($this->hasDownvoted($user)) {
            $this->increment('score');
            $this->removevote($user);
        } elseif ($this->hasUpvoted($user)) {
            $this->decrement('score', 2);
            $this->vote($user, false);
        } else {
            $this->decrement('score');
            $this->vote($user, false);
        }
    }

    public function vote($user = null, $upvote = true)
    {
        $this->votes()->updateOrCreate(
            [
                'user_id' => $user ? $user->id : auth()->id()
            ],
            [
                'vote' => $upvote
            ]
        );
    }

    public function removevote($user = null)
    {
        $this->votes()->where('user_id', $user->id)->delete();
    }

    public function hasUpvoted($user, $upvote = true)
    {
        return (bool) $user->votes
            ->where('voteable_id', $this->id)
            ->where('voteable_type', get_class())
            ->where('vote', $upvote)
            ->count();
    }

    public function hasDownvoted($user)
    {
        return $this->hasUpvoted($user, false);
    }

    public function getUpvotedAttribute($user = null): int
    {
        $user = $user ?? auth()->user();

        return $this->hasUpvoted($user);
    }

    public function getDownvotedAttribute($user = null): int
    {
        $user = $user ?? auth()->user();

        return $this->hasDownvoted($user);
    }

}
