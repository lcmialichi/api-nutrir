<?php

namespace App\Http\Controllers;

use App\Rules\Cpf;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function __construct(){

        $this->middleware(\App\Http\MiddleWare\Authorization::class);
    }
    
    public function register (UserRequest $request) { 
        
        $this->validate($request, ["*.cpf" => new Cpf]);

       dd($request->input("dadosPessoais.cpf"));
    }
}
