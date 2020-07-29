<?php

namespace App\Utils;

class UtilsString {
    public static function parseSearchTerm( $term ) {	
        return str_replace (" ", "+", $term);
    }
}