<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClaseDocumento extends Model
{
    use HasFactory;
    protected $guarded=[];

    public $timestamps = false;
    public function actividades()
    {
        return $this->belongsTo(Actividades::class, 'idActividades');
    }

    public function estado()
    {
        return $this->belongsTo(Status::class, 'idEstado');
    }
}
