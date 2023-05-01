<?php

namespace App\Http\Controllers\gestion_grupo;

use App\Http\Controllers\Controller;
use App\Models\NivelFormacion;
use Illuminate\Http\Request;

class NivelFormacionController extends Controller
{
  
  public function index()
  {
    return response()->json(NivelFormacion::all(), 200);
  }

}
