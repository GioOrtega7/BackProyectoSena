<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competencias extends Model
{
    use HasFactory;
    protected $guarded=[];
    
    public function resultadoAprendizajes()
    {
        return $this->belongsToMany(resultadoAprendizaje::class);
    }
}

