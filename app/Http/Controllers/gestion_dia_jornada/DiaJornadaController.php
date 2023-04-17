<?php

namespace App\Http\Controllers\gestion_dia_jornada;

use App\Http\Controllers\Controller;
use App\Models\DiaJornada;
use Illuminate\Http\Request;

class DiaJornadaController extends Controller
{
    public function showByJornada(int $id)
    {
        $data = DiaJornada::with(['jornada', 'dia'])
            ->where('idJornada', $id)
            ->get();
        return response()->json($data);
    }
}
