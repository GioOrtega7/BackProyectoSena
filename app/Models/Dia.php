<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dia extends Model
{
    use HasFactory;

    public static $snakeAttributes = false;
    protected $table = "dia";
    protected $fillable = [
        'id',
        'dia'
    ];
    public $timestamps = false;

    public function jornada()
    {
        return $this->belongsTo('App\Models\Jornada');
    }
}
