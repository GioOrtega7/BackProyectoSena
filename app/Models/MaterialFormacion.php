<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialFormacion extends Model
{
    protected $fillable = [
        'id', // Asegúrate de que 'id' esté presente en la lista
        'codigoMF',
        'descripcion',
        'rutaarchivo',
        // Otros atributos del modelo, si los hay
    ];

    //protected $table = 'material_formacions';

    public function actividadAprendizaje(){

        /* return $this->belongsTo(ActividadAprendizaje::class, 'idAA'); */
    }
    use HasFactory;
}
