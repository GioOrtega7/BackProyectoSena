<?php

namespace App\Http\Controllers;

use App\Models\AsignacionParticipante;
use Illuminate\Http\Request;

class AsignacionParticipanteController extends Controller
{
  public function index()
  {
    return response()->json(AsignacionParticipante::all(), 200);
  }

  

}
