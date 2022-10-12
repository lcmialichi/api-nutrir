<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAccess extends Model
{
    use HasFactory;

    protected $table = "usuario_acesso";

    public static function getUserByAccess(string $user)
    {   
        return self::join("usuario", "usuario.id", "=", "usuario_id")->first();
    }

    public function user(){
        return $this->belongsTo(User::class, "usuario_id");
    }
}
