<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Http;

class Webcomics
{
    /**
     * Gets a reply from the Webcomics API
     *
     * @param $url
     * @return \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
     */
    public static function getFromApi($path)
    {
        $response = Http::withToken(config('services.webcomics.key'))
            ->accept('application/json')
            ->get(config('services.webcomics.endpoint') . $path);

        return $response->json();

    }

}
