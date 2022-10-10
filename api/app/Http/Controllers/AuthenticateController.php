<?php

namespace App\Http\Controllers;

use App\Models\User;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Exceptions\ControllerException;
use App\Models\UserAccess;

class AuthenticateController extends Controller
{
    public function __construct(){}

    public function auth(Request $request)
    {
        $this->validate($request,  [
            "senha" => "required",
            "usuario" => "required|acesso"
        ]);

        $inputs = $request->all();
        $user = UserAccess::getUserByAccess( $inputs["usuario"] );
   

        if($user->senha != $inputs["senha"]){
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
