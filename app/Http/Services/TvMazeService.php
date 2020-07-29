<?php

namespace App\Http\Services;
use App\Http\Helpers\WebServiceHelper;

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
        $response = $this->wsHelper->apiRestCall($url);
        return json_decode($response);
    }
}
