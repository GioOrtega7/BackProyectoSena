<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class actividadAprendizaje extends Model
{
    use HasFactory;
   
    public static $snakeAttributes = false;
    protected $table = "actividadAprendizaje";

    protected $fillable = [
        "NombreAA",
        "codigoAA",
        "idEstado",
        "rap"   
    ];

    public $timestamps =false;
    public function rap()
    {
        return $this->belongsTo(resultadoAprendizaje::class, 'rap');
    }
    public function estado()
    {
        return $this->belongsTo(Status::class, 'idEstado');
    }
    


}


