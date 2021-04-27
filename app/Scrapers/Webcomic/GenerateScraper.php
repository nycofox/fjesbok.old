<?php

namespace App\Scrapers\Webcomic;


use App\Models\WebcomicSource;

class GenerateScraper extends WebcomicScraper
{

    /**
     * Converts the search string to a url with dates
     *
     * @param WebcomicSource $source
     * @return string
     */
    public function getImageUrl(WebcomicSource $source)
    {
        return $this->convertUrl($source->searchstring);
    }
}
