<?php

namespace App\Http\Controllers;

use App\Models\MaterialFormacion;
use Illuminate\Http\Request;

class MaterialFormacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materialFormacion = MaterialFormacion::all();
        return response()->json($materialFormacion);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $materialFormacions=new MaterialFormacion($data);
        $materialFormacions->save();

        return response()->json($materialFormacions);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MaterialFormacion  $materialFormacion
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {   
        $materialFormacion=MaterialFormacion::find($id);
        return response()->json($materialFormacion);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MaterialFormacion  $materialFormacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $data = $request->all();
        $materialFormacion=MaterialFormacion::findOrFail($id);
        $materialFormacion->fill($data);
        $materialFormacion->save();

        return response()->json($materialFormacion);
       

       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MaterialFormacion  $materialFormacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $materialFormacion=MaterialFormacion::findOrFail($id);
        $materialFormacion->delete();

        return response()->json([],204);
        
    }
}
