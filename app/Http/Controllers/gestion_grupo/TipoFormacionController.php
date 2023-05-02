<?php

namespace App\Http\Controllers\gestion_grupo;

use App\Http\Controllers\Controller;
use App\Models\TipoFormacion;
use Illuminate\Http\Request;

class TipoFormacionController extends Controller
{
  public function index()
  {
    return response()->json(TipoFormacion::all(), 200);
  }
}
