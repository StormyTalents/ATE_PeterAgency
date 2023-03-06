<?php

namespace App;

class Asset {

    public static function css($file = '/css/pre.css') {
        $css = file_get_contents(public_path() . $file);
        $css = preg_replace('/[\n\s]+/i', ' ',$css);
        $css = preg_replace('/\s+/i', ' ',$css);
        $css = preg_replace('/{\s*([^;]+);\s*}/i','{'.("$1").'}', $css);
        $css = preg_replace('/\s*([,{}\[\]:;!])\s*/i', "$1", $css);
        return $css;
    }

}