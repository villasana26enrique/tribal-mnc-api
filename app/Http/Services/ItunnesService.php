<?php

namespace App\Http\Services;
use App\Http\Helpers\WebServiceHelper;
use App\Handlers\ItunnesHandler;

class ItunnesService 
{

    private const URL = "https://itunes.apple.com/";

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
        $url = self::URL . "search?term=" . $search . "&limit=10";
        $response = json_decode($this->wsHelper->apiRestCall($url));
        return ItunnesHandler::handlerResponse($response);
    }
}
