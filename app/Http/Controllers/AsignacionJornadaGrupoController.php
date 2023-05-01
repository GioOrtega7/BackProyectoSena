<?php

namespace App\Http\Controllers;

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
