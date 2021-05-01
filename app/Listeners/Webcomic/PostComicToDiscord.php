<?php

namespace App\Listeners\Webcomic;

use App\Events\Webcomic\StoredWebcomic;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class PostComicToDiscord
{
    /**
     * Handle the event.
     *
     * @param StoredWebcomic $event
     * @return \Illuminate\Http\Client\Response
     */
    public function handle(StoredWebcomic $event)
    {

//        $file = Storage::get($event->strip->media->path);
        $file = file_get_contents(public_path('img/missing.jpg'));
        $filename = $event->strip->source->webcomic->slug . '-' . date('Y-m-d') . '.' . substr(strrchr($event->strip->media->path, '.'), 1);

        return Http::attach(
            'attachment', $file, $filename
        )->post(config('services.discord.webhooks.webcomics_url'), [
            'content' => $event->strip->source->webcomic->name . " (" . $event->strip->source->domain . ")",
            'embeds' => [
                ['image' => 'attachment://' . $filename],
            ]
        ]);

//        return Http::post(config('services.discord.webhooks.webcomics_url'), [
//            'content' => $event->strip->source->webcomic->name . " (" . $event->strip->source->domain . ")",
//            'file' => [
//                'attachment' => json_encode(Storage::get($event->strip->media->path)),
//                'name' => $filename
//            ],
//            'embeds' => [
//                ['image' => 'attachment://' . $filename],
//            ]
//        ]);

    }
}
