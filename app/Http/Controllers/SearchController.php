<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utils\UtilsString;
use App\Http\Services\ItunnesService;
use App\Http\Services\TvMazeService;
use App\Http\Services\CrcindService;

class SearchController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ItunnesService $itunnes,
                                TvMazeService  $tvMaze,
                                CrcindService  $crcind)
    {
        $this->itunnesService = $itunnes;
        $this->tvMaze = $tvMaze;
        $this->crcind = $crcind;
    }

    public function search(Request $request)
    {
        try {
            $term = UtilsString::parseSearchTerm( $request->input('term') );
            dd($term);
            $itunnesResponse = $this->itunnesService->getSearch( $term );
            $tvMazeResponse  = $this->tvMaze->getSearch( $term );
            //$this->crcind->getSearch( $term );
        } catch (\Exception $e) {
            return response()->json([
                "Error" => $e->getMessage()
            ]);
        }
        return response()->json([
            "itunnes" => $itunnesResponse,
            "tvMaze"  => $tvMazeResponse
        ],200);
    }
}
