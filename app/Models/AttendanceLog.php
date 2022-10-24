<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceLog extends Model
{
    use HasFactory;

    protected $table = "atendimento_log";

    public function attendance(){
        return $this->belongsTo(Attendance::class);
    }

    public function attendant(){
        return $this->belongsTo(User::class, "atendente_usuario_id");
    }

    public function attended(){
        return $this->belongsTo(User::class, "atendido_usuario_id");

    }

}
