<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;

    protected $table = "grupo";
    
    protected $guarded = [];

    //Relacion uno a muchos Inversa(TipoGrupos->Grupo)
    public function tipoGrupo(){
        return $this->belongsTo(TipoGrupo::class, 'idTipoGrupo', 'id');
    }

    //Relacion uno a muchos Inversa(Usuario->Grupo)
    public function lider(){
        return $this->belongsTo(User::class, 'idLider', 'id');
    }

    //Relacion uno a muchos Inversa(programa->Grupo)
    public function programa(){
        return $this->belongsTo(Programa::class, 'idPrograma', 'id');
    }

    //Relacion uno a muchos Inversa(Infraestructura->Grupo)
    public function infraestructura(){
        return $this->belongsTo(Infraestructura::class, 'idInfraestructura', 'id');
    }

    //Relacion uno a muchos Inversa(nivelFormacion->Grupo)
    public function nivelFormacion(){
        return $this->belongsTo(NivelFormacion::class, 'idNivel', 'id');
    }

    //Relacion uno a muchos Inversa(tipoFormacion->Grupo)
    public function tipoFormacion(){
        return $this->belongsTo(TipoFormacion::class, 'idTipoFormacion', 'id');
    }

    //Relacion uno a muchos Inversa(EstadoGrupo->Grupo)
    public function estado()
    {
        return $this->belongsTo(EstadoGrupo::class, 'idEstado');
    }

    //Relacion uno a muchos Inversa(tipoOferta->Grupo)
    public function tipoOferta(){
        return $this->belongsTo(TipoOferta::class, 'idTipoOferta', 'id');
    }
    

}
