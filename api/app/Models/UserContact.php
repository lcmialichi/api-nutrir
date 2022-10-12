<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserContact extends Model
{
    use HasFactory;

    protected $table = "usuario_contato";

    public function use(){
        return $this->belongsTo(User::class);
    }

}
