<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Http\Request;

class AuthenticationController extends Controller
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

    public function make(Request $request){
        dd($request);
    }

    //
}
