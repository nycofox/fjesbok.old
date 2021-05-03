<?php

namespace App\Providers;

use App\Events\Webcomic\StoredWebcomic;
use App\Listeners\User\CreateDefaultAlbums;
use App\Listeners\Webcomic\PostComicToDiscord;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
            CreateDefaultAlbums::class
        ],
        StoredWebcomic::class => [
//            PostComicToDiscord::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
