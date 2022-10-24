<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserAccess;
use App\Models\userAddress;
use App\Models\UserContact;
use App\Services\CRNService;
use App\Http\Requests\UserRequest;
use App\Exceptions\ControllerException;

class UserController extends Controller
{
    public function __construct()
    {

        // $this->middleware(\App\Http\MiddleWare\Authorization::class);
    }

    public function register(UserRequest $request, CRNService $crnService)
    {
        $user = new User;
        $user->load(
            ["userContact", "userAddress"]
        );

        if ($user->firstWhere("cpf", $request->dadosPessoais["cpf"])) {
            throw new ControllerException("Usuario ja possui cadastro!", 400);
        }

        $user->fill($request->dadosPessoais);
        $user->save();

        if ($request->dadosEndereco) {
            $userAddress = new userAddress;
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
        if ($request->dadosAcesso) {
            $userAccess = new UserAccess;
            $user->userAccess()->save(
                $userAccess->fill($request->dadosAcesso)
            );
        }

        if ($request->dadosNutricionista) {
            #validar CRN
            $crnService->validate($request->dadosNutricionista["crn"]);
        }

        return response()->json([
            "status" => true,
            "message" => "Usuario cadastrado com sucesso!",
            "data" => [
                "idUsuario" => $user->id
            ]
        ]);
    }

    public function update(UserRequest $request)
    {
    }
}
