<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserAddess;
use App\Models\UserContact;
use App\Http\Requests\UserRequest;
use App\Exceptions\ControllerException;

class UserController extends Controller
{
    public function __construct()
    {

        // $this->middleware(\App\Http\MiddleWare\Authorization::class);
    }

    public function register(UserRequest $request)
    {
        $user = new User;
        $user->load(
            ["userContact", "userAddress"]
        );

        if ($user->firstWhere("cpf", $request->dadosPessoais["cpf"])) {
            throw new ControllerException("Usuario ja cadastrado!", 400);
        }   

        $user->fill($request->dadosPessoais);
        $user->save();

        if ($request->dadosEndereco) {
            $userAddress = new UserAddess;
            $user->userAddress()->save(
                $userAddress->fill($request->dadosEndereco)
            );
        }
        if ($request->dadosContato) {
            $userContact = new UserContact;
            $user->userContact()->save(
                $userContact->fill($request->dadosContato)
            );
        }

        return response()->json([
            "status" => true,
            "message" => "Usuario cadastrado com sucesso!",
            "data" => [
                "idUsuario" => $user->id
            ]
        ]);
    }
}
