<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    
    protected $table = "atendimento";

    public function log(){
       return $this->hasMany(AttendanceLog::class, "atendimento_id");
    }
}
