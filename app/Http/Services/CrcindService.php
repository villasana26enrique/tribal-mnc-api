<?php

namespace App\Http\Services;
use App\Http\Helpers\WebServiceHelper;
use App\Handlers\CrcindHandler;

class CrcindService 
{

    public const URL = "http://www.crcind.com/csp/samples/SOAP.Demo.cls?wsdl";

    /**
     * Create a new service instance.
     *
     * @return void
     */
    public function __construct(WebServiceHelper $wsHelper)
    {
        $this->wsHelper = $wsHelper;
    }

    public function getSearch($term)
    {
        return CrcindHandler::handlerResponse(
            $this->wsHelper->apiSoapCall(self::URL, $term)
        );
    }
}
