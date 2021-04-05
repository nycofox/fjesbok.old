<?php

namespace App\Scrapers\Webcomic;


use App\Models\WebcomicSource;
use Illuminate\Support\Facades\Http;

class SearchScraper extends WebcomicScraper
{

    public function getImageUrl(WebcomicSource $source)
    {
        $url = $source->searchpage ?? $source->homepage;

        $searchpage = Http::get($this->convertUrl($url));

        if($searchpage->failed()) {
            return null;
        }

        $searchstring = '/' . $source->searchstring . '/';

        if(preg_match_all($searchstring, $searchpage->body(), $result)) {
            return $result[1][0];
        }

        return null;
    }
}
