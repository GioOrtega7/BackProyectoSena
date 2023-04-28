<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoFormacion extends Model
{
    use HasFactory;

    protected $table = 'tipoFormacion';

    protected $guarded = [];


    public function grupos()
    {
        return $this->hasMany(Grupo::class, 'idTipoFormacion');
    }

}
