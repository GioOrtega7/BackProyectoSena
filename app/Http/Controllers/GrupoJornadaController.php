<?php

namespace App\Http\Controllers;

use App\Models\GrupoJornada;
use Illuminate\Http\Request;

class GrupoJornadaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = GrupoJornada::with(['jornada','grupo']) -> get();
        return response() -> json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new GrupoJornada();
        $post -> idGrupo = $request -> idGrupo;
        $post -> idJornada = $request -> idJornada;
        $post -> save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GrupoJornada  $grupoJornada
     * @return \Illuminate\Http\Response
     */
    public function show(GrupoJornada $grupoJornada)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GrupoJornada  $grupoJornada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GrupoJornada $grupoJornada)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GrupoJornada  $grupoJornada
     * @return \Illuminate\Http\Response
     */
    public function destroy(GrupoJornada $grupoJornada)
    {
        //
    }
}
