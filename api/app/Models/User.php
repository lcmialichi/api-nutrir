<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory, Alias;

    protected $table = "user";
    protected $primaryKey = "id";
    protected $hidden = [];
    protected $alias = [
        "created_at" => "dataCriacao",
        "updated_at" => "dataAtualizacao"
    ];
   
}
