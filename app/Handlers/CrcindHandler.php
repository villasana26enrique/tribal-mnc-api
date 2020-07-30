<?php

namespace App\Handlers;

class CrcindHandler
{
    public static function handlerResponse($resp)
    {
        $response = array();
        if (property_exists($resp, "GetListByNameResult")) {
            foreach($resp->GetListByNameResult->PersonIdentification as $person) {
                $option = (object) array();
                $option->name = $person->Name;
                $option->ssn  = $person->SSN;
                $option->dob  = $person->DOB;
                $response[] = $option;
            }
        }
        usort($response, function($a, $b) {return strcmp($a->name, $b->name);});
        return $response;
    }
}
