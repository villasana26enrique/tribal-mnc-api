<?php

namespace App\Http\Controllers;

class KeyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function generateKey()
    {
        return response()->json([
            'key' => \Illuminate\Support\Str::random(32)
        ]);
    }
}
