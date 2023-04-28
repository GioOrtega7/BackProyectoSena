<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NivelFormacion extends Model
{
    use HasFactory;

    protected $table = 'nivelFormacion';

    protected $guarded = [];

    public function grupos()
    {
        return $this->hasMany(Grupo::class, 'idNivel');
    }

}
