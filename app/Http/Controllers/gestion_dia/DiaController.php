<?php

namespace App\Http\Controllers\gestion_dia;

use App\Http\Controllers\Controller;
use App\Models\Dia;
use Illuminate\Http\Request;

class DiaController extends Controller
{
    public function index()
    {
        $data = Dia::all();
        return response()->json($data);
    }
}
