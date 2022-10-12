<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = "usuario";
    
    public function userAccess(){
        return $this->hasMany(UserAccess::class, "usuario_id");
    }
}
