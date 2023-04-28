<?php

namespace App\Http\Controllers;

use App\Models\TipoOferta;
use Illuminate\Http\Request;

class TipoOfertaController extends Controller
{
  public function index()
  {
    return response()->json(TipoOferta::all(), 200);
  }
}
