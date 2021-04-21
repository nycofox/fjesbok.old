<?php

namespace App\Listeners\User;

use App\Models\Album;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateDefaultAlbums
{

    /**
     * Handle the event.
     *
     * @param  Registered  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        Album::create([
            'type' => 'p',
            'name' => 'Profile Pictures',
            'user_id' => $event->user->id,
            'system' => true
        ]);

        Album::create([
            'type' => 't',
            'name' => 'Timeline Pictures',
            'user_id' => $event->user->id,
            'system' => true
        ]);
    }
}
