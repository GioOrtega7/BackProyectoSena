<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competencias extends Model
{
    use HasFactory;
    public static $snakeAttributes = false;
    protected $table = "competencias";
    protected $fillable = [
        "nombreCompetencia",
        "detalleCompetencia"
    ];

    public $timestamps = false;
}
