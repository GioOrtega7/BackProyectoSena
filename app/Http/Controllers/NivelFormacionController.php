<?php

namespace App\Http\Controllers;

use App\Models\NivelFormacion;
use Illuminate\Http\Request;

class NivelFormacionController extends Controller
{
  
  public function index()
  {
    return response()->json(NivelFormacion::all(), 200);
  }

}
