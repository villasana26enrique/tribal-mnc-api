<?php

namespace App\Http\Services;

class ItunnesService 
{

    private const URL = "https://itunes.apple.com/";

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
        //search?term=jack+johnson
    }
}
