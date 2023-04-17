<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jornada extends Model
{
    use HasFactory;
    public static $snakeAttributes = false;
    protected $table = "jornada";
    protected $fillable = [
        'id',
        'nombreJornada',
        'descripcion',
        'horaInicial',
        'horaFinal',
        'numeroHoras'
    ];

    public function diaJornada()
    {
        return $this->belongsToMany('App\Models\Dia', 'asignacionDiaJornada', 'idJornada', 'idDia');
    }
}
