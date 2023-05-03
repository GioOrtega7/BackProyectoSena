<?php

namespace App\Http\Controllers\gestion_grupo;

use App\Http\Controllers\Controller;
use App\Models\AsignacionJornadaGrupo;
use Illuminate\Http\Request;

class AsignacionJornadaGrupoController extends Controller
{
  public function index()
  {
    $data = AsignacionJornadaGrupo::with(['jornada','grupo']) -> get();
    return response() -> json($data);
    
  }
  
}