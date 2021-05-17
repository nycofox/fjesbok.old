<?php


namespace App\Scrapers\Webcomic;


use App\Events\Webcomic\StoredWebcomic;
use App\Models\Media;
use App\Models\WebcomicSource;
use App\Models\WebcomicStrip;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

abstract class WebcomicScraper
{
    protected string $title;

    protected string $description;

    /**
     * Main class must have function to get the Image URL
     * @param WebcomicSource $source
     */
    abstract public function getImageUrl(WebcomicSource $source);

    /**
     * Download the image
     *
     * @param $url
     * @param WebcomicSource $source
     * @return string|null
     */
    public function downloadImage($url, WebcomicSource $source)
    {
        $url = html_entity_decode($url);

        if($source->baseurl) {
            $url = $source->baseurl . $url;
        }

        $response = Http::withHeaders([
            'Referer' => $source->searchpage ?? $source->homepage,
        ])
            ->get($url);

        if(!$response->successful()) {
            return null;
        }

        return $response;
    }

    /**
     * Store the Image to the CDN, and create corresponding
     * records in WebcomicStrip and Media
     *
     * @param $response
     * @param WebcomicSource $source
     * @return WebcomicStrip|null
     */
    public function storeImage($response, WebcomicSource $source): ?WebcomicStrip
    {
        $path = 'webcomics/' . $source->id . '/' . Str::random(30) . '.' . basename($response->header('Content-Type'));

        if(!$media = Media::storeFromString($path, $response->body())) {
            return null;
        }

        $strip = $source->strips()->create([
            'media_id' => $media->id,
            'date' => date('Y-m-d'),
        ]);

        $source->update(['last_scraped_at' => now()]);

        event(new StoredWebcomic($strip));

        return $strip ?? null;
    }

    /**
     * Checks if an image already exists
     *
     * @param $md5
     * @return bool
     */
    public function checkDuplicate($md5): bool
    {
        return (bool)Media::whereHash($md5)->first();
    }

    /**
     * Converts %Y, %M, %m, %D, %d to their date equivalents
     *
     * @param $string
     * @return string
     */
    protected function convertUrl($string): string
    {
        $string = str_replace('%Y', date('Y'), $string);
        $string = str_replace('%y', date('y'), $string);
        $string = str_replace('%m', date('m'), $string);
        $string = str_replace('%d', date('d'), $string);

        return $string;
    }
}
