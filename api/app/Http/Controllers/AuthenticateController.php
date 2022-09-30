<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;

class AuthenticateController extends Controller
{
    public function auth(UserRequest $request){

        return response()->json($request->all(), 200);
    }
}
