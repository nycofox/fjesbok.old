<?php

namespace App\Listeners\Webcomic;

use App\Events\Webcomic\StoredWebcomic;
use Illuminate\Support\Facades\Http;

class PostComicToDiscord
{
    /**
     * Handle the event.
     *
     * @param  StoredWebcomic  $event
     * @return \Illuminate\Http\Client\Response
     */
    public function handle(StoredWebcomic $event)
    {
        return Http::post(config('services.discord.webhooks.webcomics_url'), [
            'content' => $event->strip->source->webcomic->name . " (". $event->strip->source->domain . ")",
            'embeds' => [
                [
                    'image' => ['url' => $event->strip->media->url],
        ]
            ],
        ]);
    }
}
