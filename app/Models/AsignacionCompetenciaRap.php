<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsignacionCompetenciaRap extends Model
{
    use HasFactory;

    protected $table = 'asignacionCompetenciasRaps'; 

    public function competencias(){
        return $this -> belongsTo(Competencias::class,'idCompetencia');
    }
    public function resultadoAprendizaje(){
        return $this -> belongsTo(resultadoAprendizaje::class,'idRap');
    }

}
