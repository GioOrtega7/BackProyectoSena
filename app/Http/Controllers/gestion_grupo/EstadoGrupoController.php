<?php

namespace App\Http\Controllers\gestion_grupo;

use App\Http\Controllers\Controller;
use App\Models\EstadoGrupo;
use Illuminate\Http\Request;

class EstadoGrupoController extends Controller
{
  public function index()
  {
    return response()->json(EstadoGrupo::all(), 200);
  }
}
