<?php

namespace App\Http\Services;

class CrcindService 
{

    private const URL = "";

    /**
     * Create a new service instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function getSearch($search)
    {
        dd($search);
        //search/shows?q=girls
    }
}
