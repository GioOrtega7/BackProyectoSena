<?php

namespace App\Http\Controllers\gestion_grupo;

use App\Http\Controllers\Controller;
use App\Models\TipoOferta;
use Illuminate\Http\Request;

class TipoOfertaController extends Controller
{
  public function index()
  {
    return response()->json(TipoOferta::all(), 200);
  }
}
