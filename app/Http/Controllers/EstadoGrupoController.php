<?php

namespace App\Http\Controllers;

use App\Models\EstadoGrupo;
use Illuminate\Http\Request;

class EstadoGrupoController extends Controller
{
  public function index()
  {
    return response()->json(EstadoGrupo::all(), 200);
  }
}
