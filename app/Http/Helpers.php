<?php

/**
 * Creates a dereferer URL to hide origin
 *
 * @param $url
 * @return string
 */
function deref_url($url): string {

    return config('services.dereferer.url') . '?' . $url;
}
