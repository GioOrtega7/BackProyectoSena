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

    $tipoGrupo       = $request->input('tipoGrupo');
    $lider           = $request->input('usuario');
    $programa        = $request->input('programa');
    $infraestructura = $request->input('infraestructura');
    $nivelFormacion  = $request->input('nivelFormacion');
    $tipoFormacion   = $request->input('tipoFormacion');
    $estadoGrupo     = $request->input('estadoGrupo');
    $tipoOferta      = $request->input('tipoOferta');



    $grupos = Grupo::with('tipoGrupo', 'lider.persona', 'programa', 'infraestructura', 'nivelFormacion', 'tipoFormacion', 'estadoGrupo', 'tipoOferta');

    

    if ($tipoGrupo) {
      $grupos->whereHas('tipoGrupo', function ($q) use ($tipoGrupo) {
        return $q->select('id')->where('id', $tipoGrupo)->orWhere('nombreTipoGrupo', $tipoGrupo);
      });
    }

    if ($lider) {
      $grupos->whereHas('usuario', function ($q) use ($lider) {
        return $q->select('id')->where('id', $lider)->orWhere('nombre1', $lider);
      });
    }

    if ($programa) {
      $grupos->whereHas('programa', function ($q) use ($programa) {
        return $q->select('id')->where('id', $programa)->orWhere('nombrePrograma', $programa);
      });
    }

    if ($infraestructura) {
      $grupos->whereHas('infraestructura', function ($q) use ($infraestructura) {
        return $q->select('id')->where('id', $infraestructura)->orWhere('nombreInfraestructura', $infraestructura);
      });
    }

    if ($nivelFormacion) {
      $grupos->whereHas('nivelFormacion', function ($q) use ($nivelFormacion) {
        return $q->select('id')->where('id', $nivelFormacion)->orWhere('nivel', $nivelFormacion);
      });
    }

    if ($tipoFormacion) {
      $grupos->whereHas('tipoFormacion', function ($q) use ($tipoFormacion) {
        return $q->select('id')->where('id', $tipoFormacion)->orWhere('nombreTipoFormacion', $tipoFormacion);
      });
    }

    if ($estadoGrupo) {
      $grupos->whereHas('estadoGrupo', function ($q) use ($estadoGrupo) {
        return $q->select('id')->where('id', $estadoGrupo)->orWhere('nombreEstado', $estadoGrupo);
      });
    }

    if ($tipoOferta) {
      $grupos->whereHas('tipoOferta', function ($q) use ($tipoOferta) {
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
