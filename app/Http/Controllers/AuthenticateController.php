<?php

namespace App\Http\Controllers;

use App\Models\User;
use Firebase\JWT\JWT;
use App\Models\UserAccess;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Exceptions\ControllerException;
use Illuminate\Support\Facades\Validator;

class AuthenticateController extends Controller
{
    public function __construct(){}

    public function auth(Request $request)
    {
        $validation = Validator::make($inputs = $request->all(),  [
            "senha" => "required|string",
            "usuario" => "required|string"
        ]);

        if($validation->fails()){
            throw new ControllerException( $validation->errors()->first(), 422);
        }
        
        $user = UserAccess::with(["user"])->where("acesso", $inputs["usuario"])->first();
        if(!$user){
            throw new ControllerException("Usuario ou senha Invalidos!", 401);
        }

        if($user->senha != $inputs["senha"]){
            throw new ControllerException("Usuario ou senha Invalidos!", 401);

        }

        $jwt = JWT::encode([
            "id" => $user->user->id, 
            "date" =>time(), 
            "expire" => time() + 3600 
            ],getenv("JWT_SECRET"), 'HS256'
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
