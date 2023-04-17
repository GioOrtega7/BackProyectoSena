<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    use HasFactory;

    protected $table = 'sede';

    public function ciudad(){
        return $this -> belongsTo(
            City::class,'idCiudad'
        );
    }
    public function infraestructuras(){
        return $this -> hasMany(
            Infraestructura::class,'idSede'
        );
    }
}
