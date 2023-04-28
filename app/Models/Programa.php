<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    use HasFactory;

    public static $snakeAttributes = false;
    protected $table = "programa";
    protected $fillable = [
    "nombrePrograma",
    "codigoPrograma",
    "descripcionPrograma",
    "idTipoPrograma",
    "idEstado",
    "totalHoras",
    "etapaLectiva",
    "etapaProductiva",
    "creditosLectiva",
    "creditosProductiva"
    ];
    public $timestamps = false;

    //relacion uno a muchos tipo programa
    public function tipoPrograma()
    {
        return $this->belongsTo(TipoProgramas::class, 'idTipoPrograma');
    }
    
    //relacion uno a muchos estado
    public function estado()
    {
        return $this->belongsTo(Status::class, 'idEstado');
    }
}
