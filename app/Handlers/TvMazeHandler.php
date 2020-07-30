<?php

namespace App\Handlers;

class TvMazeHandler
{
    public static function handlerResponse($resp)
    {
        $response = array();
        foreach($resp as $result) {
            $option = (object) array();
            $option->name = $result->show->name;
            $option->language = $result->show->language;
            $option->premiered = $result->show->premiered;
            $option->summary  = $result->show->summary;
            $option->img  = ($result->show->image) ? $result->show->image->medium: null;
            $response[] = $option;
        }
        usort($response, function($a, $b) {return strcmp($a->name, $b->name);});
        return $response;
    }
}
