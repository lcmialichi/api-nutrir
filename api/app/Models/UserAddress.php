<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;

    protected $table = "usuario_endereco";

    protected $fillable = [
        "rua", "cidade", "estado", "bairro", "complemento"
    ];

    protected $attributes = [
        "complemento" => ""
    ];

    public function use(){
        return $this->belongsTo(User::class);
    }


}
