<?php

namespace App;

use Prismic\Api;
use Prismic\LinkResolver;
use Prismic\Predicates;
use Prismic\Dom\RichText;
use Prismic\Dom\Link;

class CMS {

    public static function fetch($type, $uid) {

        $url = config('services.prismic.url');
        $token = config('services.prismic.token');
        $api = Api::get($url, $token);
        $response = $api->getByUID($type, $uid);

        return $response;

        #return null;

    }

    public static function asHtml($document, $part) {
        if(!isset($document->$part)) {
            return "";
        }
        $linkResolver = new Link();
        return RichText::asHtml($document->$part, $linkResolver);
    }

    public static function asText($document, $part) {
        if(!isset($document->$part)) {
            return "";
        }
        return trim(RichText::asText($document->$part));
    }

}
