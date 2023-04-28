<?php

namespace App\Http\Controllers;

use App\Models\AsignacionJornadaGrupo;
use Illuminate\Http\Request;

class AsignacionJornadaGrupoController extends Controller
{
  public function index()
  {
    return response()->json(AsignacionJornadaGrupo::all(), 200);
  }


  
}
