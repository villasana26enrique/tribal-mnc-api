<?php

namespace App\Http\Services;
use App\Http\Helpers\WebServiceHelper;
use App\Handlers\TvMazeHandler;

class TvMazeService 
{

    private const URL = "http://api.tvmaze.com/";

    /**
     * Create a new service instance.
     *
     * @return void
     */
    public function __construct(WebServiceHelper $wsHelper)
    {
        $this->wsHelper = $wsHelper;
    }

    public function getSearch($search)
    {
        $url = self::URL . "search/shows?q=" . $search;
        $response = json_decode($this->wsHelper->apiRestCall($url));
        return TvMazeHandler::handlerResponse($response);
    }
}
