<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\Authenticate;
use App\Models\User;
use App\Exceptions\UserException;

class AuthenticationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function make(Request $request)
    {
        $email = $request->input("email");
        $password = $request->input("password");

        $user = User::where("email", $email)
            ->where("senha", $password)->get();

        if ($user->isEmpty()) {
            throw new UserException("usuario invalido!", 401);
        }
        return response()->json(
            [
                "message" => "usuario autenticado com sucesso",
                "data" => $user
            ],
            200
        );
    }

    //
}
