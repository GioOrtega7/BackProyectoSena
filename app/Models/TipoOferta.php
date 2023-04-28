<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoOferta extends Model
{
    use HasFactory;

    protected $table = 'tipoOferta';

    protected $guarded = [];

    public function grupos()
    {
        return $this->hasMany(Grupo::class, 'idTipoOferta');
    }

}
