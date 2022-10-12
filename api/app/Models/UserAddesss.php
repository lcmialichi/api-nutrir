<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddesss extends Model
{
    use HasFactory;

    protected $table = "usuario_endereco";

    public function use(){
        return $this->belongsTo(User::class);
    }


}
