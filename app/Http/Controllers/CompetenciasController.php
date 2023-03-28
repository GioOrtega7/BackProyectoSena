<?php

namespace App\Http\Controllers;

use App\Http\Controllers\controller;
use App\Models\Competencias;
use Illuminate\Http\Request;

class CompetenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        
     public function index()
    {
        $competencia = Competencias::all();

        return response()->json($competencia);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data=$request->all();
        $competencia = new Competencias($data);
        $competencia->save();

        return response()->json($competencia,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Competencias  $competencias
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
         $competencia = Competencias::find($id);

         return response()->json($competencia);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Competencias  $competencias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $data = $request->all();
        $competencia = Competencias::findOrFail($id);
        $competencia->fill($data);
        $competencia->save();

        return response()->json($competencia);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Competencias  $competencias
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $competencia = Competencias::findOrFail($id);
        $competencia->delete();

        return response()->json([],204);
    }
}
