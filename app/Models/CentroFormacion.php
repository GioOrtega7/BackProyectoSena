<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CentroFormacion extends Model
{
    use HasFactory;
    public static $snakeAttributes = false;
    protected $table = "centroFormacion";
    protected $fillable = [
    "nombreCentro",
    "idRegional"
    ];
    public $timestamps = false;

    public function regional()
    {
        return $this->belongsTo(Regional::class, 'idRegional');
    }
}
