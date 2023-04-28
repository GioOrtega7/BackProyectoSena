<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoGrupo extends Model
{
    use HasFactory;

    protected $table = 'estadoGrupo';

    protected $guarded = [];

    //Relacion uno a muchos (Grupo)
    public function grupos()
    {
        return $this->hasMany(Grupo::class, 'idEstado');
    }
}
