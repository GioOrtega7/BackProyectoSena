<?php

namespace App\Http\Controllers;

use app\Models\AsignacionCompetenciaRap;
use Illuminate\Http\Request;

class asignacionCompetenciaRapController extends Controller
{

    public function index(Request $request)
    {
        $competencia = $request->input('competencias');
        $resultado = $request->input('resultadoAprendizaje');
        $asignacion = AsignacionCompetenciaRap::with('competencias','resultadoAprendizaje');


        if($competencia){
            $asignacion->whereHas('competencias',function($q) use ($competencia){
                return $q->select('id')->where('id',$competencia)->orWhere('nombre',$competencia);
            });
        };

        if($resultado){
            $asignacion->whereHas('resultadoAprendizaje',function($q) use ($resultado){
                return $q->select('id')->where('id',$resultado)->orWhere('resultadoAprendizaje',$resultado);
            });
        };

        return response()->json($asignacion->get());
    }

   
    public function store(Request $request)
    {
        //
    }

   
    public function show(AsignacionCompetenciaRap $AsignacionCompetenciaRap)
    {
        //
    }

    
    public function update(Request $request, AsignacionCompetenciaRap $AsignacionCompetenciaRap)
    {
        //
    }

    
    public function destroy(AsignacionCompetenciaRap $AsignacionCompetenciaRap)
    {
        //
    }
}
