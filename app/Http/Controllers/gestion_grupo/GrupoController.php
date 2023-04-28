<?php

namespace App\Http\Controllers\gestion_grupo;

use App\Http\Controllers\Controller;
use App\Models\Grupo;
use App\Models\TipoGrupo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $tipoGrupo       = $request->input('tipogrupo');
        $lider           = $request->input('idpersona');
        $programa        = $request->input('nombrePrograma');
        $infraestructura = $request->input('nombreInfraestructura');
        $nivelFormacion  = $request->input('nivel');
        $tipoFormacion   = $request->input('nombreTipoFormacion');
        $estadoGrupo     = $request->input('nombreEstado');
        $tipoOferta      = $request->input('nombreOferta');



        $grupos = Grupo::with('tipoGrupo', 'lider.persona', 'programa', 'infraestructura', 'nivelFormacion', 'tipoFormacion', 'estado', 'tipoOferta');
    


        if ($tipoGrupo) {
            $grupos->whereHas('grupos', function ($q) use ($tipoGrupo) {
                return $q->select('id')->where('id', $tipoGrupo)->orWhere('nombreTipoGrupo', $tipoGrupo);
            });
        }

        if ($lider) {
            $grupos->whereHas('idpersona', function ($q) use ($lider) {
                return $q->select('id')->where('id', $lider)->orWhere('contrasena', $lider);
            });
        }

        if ($programa) {
            $grupos->whereHas('nombrePrograma', function ($q) use ($programa) {
                return $q->select('id')->where('id', $programa)->orWhere('nombrePrograma', $programa);
            });
        }

        if ($infraestructura) {
            $grupos->whereHas('nombreInfraestructura', function ($q) use ($infraestructura) {
                return $q->select('id')->where('id', $infraestructura)->orWhere('nombreInfraestructura', $infraestructura);
            });
        }

        if ($nivelFormacion) {
            $grupos->whereHas('nivelFormacion', function ($q) use ($nivelFormacion) {
                return $q->select('id')->where('id', $nivelFormacion)->orWhere('nivelFormacion', $nivelFormacion);
            });
        }

        if ($tipoFormacion) {
            $grupos->whereHas('nombreTipoFormacion', function ($q) use ($tipoFormacion) {
                return $q->select('id')->where('id', $tipoFormacion)->orWhere('nombreTipoFormacion', $tipoFormacion);
            });
        }

        if ($estadoGrupo) {
            $grupos->whereHas('estadoGrupo', function ($q) use ($estadoGrupo) {
                return $q->select('id')->where('id', $estadoGrupo)->orWhere('nombreEstado', $estadoGrupo);
            });
        }

        if ($tipoOferta) {
            $grupos->whereHas('nombreOferta', function ($q) use ($tipoOferta) {
                return $q->select('id')->where('id', $tipoOferta)->orWhere('nombreOferta', $tipoOferta);
            });
        }

        return response()->json($grupos->get());
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
        $grupo = new Grupo($data);
        $grupo->save();

        return response()->json($grupo, 201);
    }

    /**
     * search a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function buscarGrupos(Request $request)
    {
        $grupo = $request->get('grupo');

        $querys = Grupo::with('tipogrupo')->where('nombre', 'LIKE', '%' . $grupo . '%')->get();

        return response()->json($querys);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models$grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dato = Grupo::find($id);
        if (!$dato) {
            return response()->json(['error' => 'El dato no fue encontrado'], 404);
        }
        return response()->json($dato);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models$grupo  $grupo
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, int $id)
    {
        $data = $request->all();
        $grupo = Grupo::findOrFail($id);
        $grupo->fill($data);
        $grupo->save();

        return response()->json($grupo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models$grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $grupo = Grupo::findOrFail($id);
        $result = $grupo->delete();
        if ($result) {
            return ["result" => "delete success"];
        } else {
            return ["result" => "delete failed"];
        }
    }
}
