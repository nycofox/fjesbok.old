<?php

namespace App\Events\Webcomic;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class StoredWebcomic
{
    use SerializesModels;

    public $strip;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($strip)
    {
        $this->strip = $strip;
    }

}
