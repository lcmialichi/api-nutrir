<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = "usuario";
    
    protected $fillable = [
        "nome", "cpf", "nascimento"
    ];

    public function userAccess(){
        return $this->hasMany(UserAccess::class, "usuario_id");
    }

    public function userContact(){
        return $this->hasOne(UserContact::class, "usuario_id");
    }

    public function userAddress(){
        return $this->hasOne(UserAddress::class, "usuario_id");
    }

    
}
