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
    public function __construct(ItunnesService $itunes,
                                TvMazeService  $tvMaze,
                                CrcindService  $crcind)
    {
        $this->itunesService = $itunes;
        $this->tvMaze = $tvMaze;
        $this->crcind = $crcind;
    }

    public function search(Request $request)
    {
        try {
            $term = UtilsString::parseSearchTerm( $request->input('term') );
            $itunesResponse = $this->itunesService->getSearch( $term );
            $tvMazeResponse  = $this->tvMaze->getSearch( $term );
            $crResponse = $this->crcind->getSearch( $term );
        } catch (\Exception $e) {
            return response()->json([
                "Error" => $e->getMessage()
            ]);
        }
        return response()->json([
            "itunes" => $itunesResponse,
            "tvMaze"  => $tvMazeResponse,
            "crcind"    => $crResponse
        ],200);
    }
}
