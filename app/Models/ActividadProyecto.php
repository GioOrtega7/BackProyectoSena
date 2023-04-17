<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActividadProyecto extends Model
{
    use HasFactory;
    public static $snakeAttributes = false;
    protected $table = "actividadProyecto";
    protected $fillable = [
    "nombreActividadProyecto",
    "codigoAP",
    "idFase"
    ];
    public $timestamps = false;

    public function fase()
    {
        return $this->belongsTo(Fase::class, 'idFase');
    }

}
