<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competencias extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $table = "competencias";

    protected $fillable = [
        "nombreCompetencia",
        "codigoCompetencia",
        "idActividadProyecto",
      
    ];

    public $timestamps =false;


    //relacion uno a muchos
    public function actividadProyecto()
    {
        return $this->belongsTo(ActividadProyecto::class, 'idActividadProyecto');
    }
    
    //relacion muchos a  muchos
    public function resultadoAprendizajes()
    {
        return $this->belongsToMany(resultadoAprendizaje::class, 'asignacionCompetenciasRaps');
    }
}

