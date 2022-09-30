<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(){

        $this->middleware(\App\Http\MiddleWare\Authorization::class);
    }
    
    public function register (Request $requet) {
        echo "roudou";
    }
}
