<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoJornada extends Model
{
    use HasFactory;

    protected $table = 'asignacionJornadaGrupo';

    public function jornada(){
        return $this -> belongsTo(Jornada::class,'idJornada');
    }
    public function grupo(){
        return $this -> belongsTo(Grupo::class,'idGrupo');
    }

}
