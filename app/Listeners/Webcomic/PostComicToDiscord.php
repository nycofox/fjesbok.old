<?php

namespace App\Listeners\Webcomic;

use App\Events\Webcomic\StoredWebcomic;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Http;

class PostComicToDiscord
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  StoredWebcomic  $event
     * @return \Illuminate\Http\Client\Response
     */
    public function handle(StoredWebcomic $event)
    {
//        dd($event->strip->media->url);

        return Http::post(config('services.discord.webcomics_key'), [
            'content' => $event->strip->source->webcomic->name . " (". $event->strip->source->domain . ")",
            'embeds' => [
                [
                    'image' => ['url' => $event->strip->media->url],
        ]
            ],
        ]);
    }
}