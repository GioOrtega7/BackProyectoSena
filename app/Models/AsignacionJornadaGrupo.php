<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsignacionJornadaGrupo extends Model
{
    use HasFactory;

    protected $table = 'asignacionJornadaGrupo';
    protected $guarded = [];

    public function jornada(){
        return $this -> belongsTo(Jornada::class,'idJornada');
    }
    public function grupo(){
        return $this -> belongsTo(Grupo::class,'idGrupo');
    }

}
