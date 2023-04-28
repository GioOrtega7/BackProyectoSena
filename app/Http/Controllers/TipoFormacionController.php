<?php

namespace App\Http\Controllers;

use App\Models\TipoFormacion;
use Illuminate\Http\Request;

class TipoFormacionController extends Controller
{
  public function index()
  {
    return response()->json(TipoFormacion::all(), 200);
  }
}
