<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;

    protected $table = "grupo";
    
    protected $fillable = [
        "nombre",
        "fechaInicial",
        "fechaFinal",
        "observacion",
        "idTipoGrupo"
    ];

    //Relacion uno a muchos Inversa(TipoGrupos->Grupo)
    public function tipoGrupo(){
        return $this->belongsTo(TipoGrupo::class, 'idTipoGrupo', 'id');
    }
    

}
