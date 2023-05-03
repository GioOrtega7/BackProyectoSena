<?php

namespace App\Http\Controllers;

use App\Models\HorarioInfraestructuraGrupo;
use Illuminate\Http\Request;

class HorarioInfraestructuraGrupoController extends Controller
{
    public function index()
    {
        $data = HorarioInfraestructuraGrupo::with(['infraestructura','grupo']) -> get();
        return response() -> json($data);
    }
}
