<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data =City::with(['departamento','sedes']) -> get();
        return response() -> json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $data =City::with(['departamento','sedes']) -> find($id);
        return response() -> json($data);
    }

    /**
     * Display ciudades por departamento
     */
    public function showByDepartamento(int $id){

        $ciudades = City::with('departamento')
            -> where('idDepartamento',$id)
            -> get();

        return response() -> json($ciudades);
    }
}
