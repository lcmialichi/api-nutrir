<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserAccess;
use App\Models\User as UserModel;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new UserModel;
        $userAccess = new UserAccess;
        $user->nome = "Lucas Mialichi";
        $user->cpf = 39988129890;
        $user->nascimento = (new \DateTime())->format("Y-m-d H:i:s");
        $userAccess->acesso = "lucas.mialichi";
        $userAccess->senha = "Mudar123";
        $userAccess->nutricionista = 1;
        $userAccess->usuario_id = $user->save();
        $userAccess->save();
  
        // UserModel::insert([
        //     "nome" => "Lucas Mialichi",
        //     "nascimento" => date("Y-m-d H:i:s"),
        //     "cpf" => "39988129890"
        // ]);

        // UserAccess::insert([
        //     "usuario_id" => 1,
        //     "acesso" => "lucas.mialichi",
        //     "senha" => "mudar123"
        // ]);
    }
}
