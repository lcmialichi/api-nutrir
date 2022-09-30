<?php

namespace App\Http\Controllers;

use App\Exceptions\ControllerException;
use App\Models\User;
use Firebase\JWT\JWT;
use App\Http\Requests\UserRequest;

class AuthenticateController extends Controller
{
    public function __construct(){}

    public function auth(UserRequest $request)
    {

        $inputs = $request->all();
        $user = User::where("email", $inputs["email"] )->first()->toAlias(true);
        if($user->senha != $inputs["password"]){
            throw new ControllerException("Usuario ou senha Invalidos!", 401);

        }

        $jwt = JWT::encode([
            "id" => $user->id, 
            "date" =>time(), 
            "expire" => time() + 3600 
            ],getenv("JWTKEY"), 'HS256'
        );

        return response()->json([
            "status" => true,
            "message" => "Usuario autenticado com sucesso!",
            "data" => [
                "jwt" => $jwt,
                "expireIn" => time() + 3600
            ]
        ], 200);
    }
}
