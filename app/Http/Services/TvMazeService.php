<?php

namespace App\Http\Services;

class TvMazeService 
{

    private const URL = "http://api.tvmaze.com/";

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
