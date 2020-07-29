<?php

namespace App\Http\Helpers;
use SoapClient;

class WebServiceHelper 
{

    /**
     * Create a new helper instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function apiRestCall($url)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET"
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }

    public function apiSoapCall($url, $term)
    {
        $client = new SoapClient($url);
        return $client->__soapCall("GetListByName", array([ "name" => $term]));
    }
}
