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
    $tipoGrupo = $request->input('tipogrupo');
    $grupo = Grupo::with('tipogrupo');

    if ($tipoGrupo) {
      $grupo->whereHas('grupos', function ($q) use ($tipoGrupo) {
        return $q->select('id')->where('id', $tipoGrupo)->orWhere('nombreTipoGrupo', $tipoGrupo);
      });
    }

    return response()->json($grupo->get());
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
