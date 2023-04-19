<?php

namespace App\Http\Controllers;

use App\Models\Sede;
use Illuminate\Http\Request;

class SedeController extends Controller
{
    /**
     * Display a listing of the resource.
    */
    public function index()
    {
        $data = Sede::with(['ciudad','infraestructuras']) -> get();
        return response() -> json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $post = new Sede();
        $post -> nombreSede = $request -> nombreSede;
        $post -> direccion = $request -> direccion;
        $post -> telefono = $request -> telefono;
        $post -> descripcion = $request -> descripcion;
        $post -> idCiudad = $request -> idCiudad;

        $post -> save();

    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $sede = Sede::with(['ciudad','infraestructuras']) -> find($id);
        return response() -> json($sede);
    }

    /**
     * Muestra las sedes dependiendo de la ciudad
     */
    public function showByCiudad(int $id){
        $sedes = Sede::with(['ciudad','infraestructuras'])
            -> where('idCiudad',$id)
            -> get();

        return response() -> json($sedes);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,int $id)
    {
        // Validar los datos recibidos del formulario
        $request->validate([
            'nombreSede' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'descripcion' => 'required',
            'idCiudad' => 'required'
        ]);

        // Encontrar el registro a actualizar en la base de datos
        $registro = Sede::findOrFail($id);

        // Actualizar los valores del registro
        $registro->nombreSede = $request->nombreSede;
        $registro->direccion = $request->direccion;
        $registro->telefono = $request->telefono;
        $registro->descripcion = $request->descripcion;
        $registro->idCiudad = $request->idCiudad;

        // Guardar los cambios en la base de datos
        $registro->save();

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $competencia = Sede::findOrFail($id);
        $competencia->delete();

    }
}
