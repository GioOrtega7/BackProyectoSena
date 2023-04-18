<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class resultadoAprendizaje extends Model
{
    use HasFactory;
    public static $snakeAttributes = false;
    protected $table = "resultadoAprendizaje";
    protected $fillable = [
        "rap",
        "codigoRap"
    ];

    public $timestamps = false;
    public function competencias()
{
    return $this->belongsToMany(Competencias::class);
}


}
