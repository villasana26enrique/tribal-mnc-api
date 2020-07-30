<?php

namespace App\Handlers;

class ItunnesHandler
{
    public static function handlerResponse($resp)
    {
        $response = array();
        foreach($resp->results as $result) {
            $option = (object) array();
            $option->kind = (property_exists($result,"kind")) ? $result->kind: null; 
            $option->type = $result->wrapperType;
            $option->artistName  = $result->artistName;
            $option->trackName   = (property_exists($result,"trackName")) ? $result->trackName: null;
            $option->img  = $result->artworkUrl100;
            $response[] = $option;
        }
        usort($response, function($a, $b) {return strcmp($a->artistName, $b->artistName);});
        return $response;
    }
}
