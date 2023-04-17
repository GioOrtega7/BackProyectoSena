<?php

namespace App\Http\Controllers;

use App\Models\Infraestructura;
use Illuminate\Http\Request;

class InfraestructuraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = InfraEstructura::with(['sede','area']) -> get();
        return response() -> json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = new InfraEstructura();
        $post -> nombreInfraestructura = $request -> nombreInfraestructura;
        $post -> capacidad = $request -> capacidad;
        $post -> descripcion = $request -> descripcion;
        $post -> idSede = $request -> idSede;
        $post -> idArea = $request -> idArea;

        $post -> save();

    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $infraestructura = InfraEstructura::with(['sede','area']) -> find($id);
        return response() -> json($infraestructura);
    }
     /**
     * Muestra las infraestructuras dependiendo de la sede
     */
    public function showBySede(int $id){
        $infraestructuras = Infraestructura::with(['sede','area'])
            -> where('idSede',$id)
            -> get();

        return response() -> json($infraestructuras);
    }
    /**
     * Muestra las infraestructuras dependiendo de la area
     */
    public function showByArea(int $id){
        $infraestructuras = Infraestructura::with(['sede','area'])
            -> where('idArea',$id)
            -> get();

        return response() -> json($infraestructuras);
    }
    /**
     * Muestra las infraestructuras dependiendo de la sede y la ciudad
     */
    public function showBySedeArea(int $idSede,int $idArea){
        $infraestructuras = Infraestructura::with(['sede','area'])
            -> where('idSede',$idSede)
            -> where('idArea',$idArea)
            -> get();

        return response() -> json($infraestructuras);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $request -> validate([
            'nombreInfraestructura' => 'required',
            'capacidad' => 'required',
            'descripcion' => 'required',
            'idArea' => 'required',
            'idSede' => 'required'
        ]);

        $registro = InfraEstructura::findOrFail($id);

        $registro -> nombreInfraestructura = $request -> nombreInfraestructura;
        $registro -> capacidad = $request -> capacidad;
        $registro -> descripcion = $request -> descripcion;
        $registro -> idArea = $request -> idArea;
        $registro -> idSede = $request -> idSede;

        $registro -> save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $infraestructura = InfraEstructura::findOrFail($id);
        $infraestructura -> delete();

    }
}
