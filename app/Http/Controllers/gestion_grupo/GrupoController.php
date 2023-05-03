<?php

namespace App\Http\Controllers\gestion_grupo;

use App\Http\Controllers\Controller;
use App\Models\AsignacionJornadaGrupo;
use App\Models\AsignacionParticipante;
use App\Models\Grupo;
use App\Models\HorarioInfraestructuraGrupo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $infraestructura = $request->input('horarioInfraestructuraGrupo');
        $nivelFormacion  = $request->input('nivel');
        $tipoFormacion   = $request->input('nombreTipoFormacion');
        $estadoGrupo     = $request->input('nombreEstado');
        $tipoOferta      = $request->input('nombreOferta');



        $grupos = Grupo::with([
            'tipoGrupo',
            'lider.persona',
            'programa',
            'infraestructura' => function ($query) {
                $query->withPivot('fechaInicial', 'fechaFinal'); // Mostrara los datos de la infraestructura
            },                                                   // y ademas los campos restantes de la tabla intermedia
            'nivelFormacion',
            'tipoFormacion',
            'estadoGrupo',
            'tipoOferta',
            'gruposJornada',
            'participantes' => function ($query) {
                $query->withPivot('fechaInicial', 'fechaFinal', 'descripcion');
            }
        ]);

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
            $grupos = $grupos->map(function ($grupo) {
                $infraestructura = $grupo->infraestructura->map(function ($infra) {
                    $pivot = $infra->pivot;
                    unset($infra->pivot); // eliminar el objeto pivot para evitar redundancia
                    return [
                        'idInfraestructura' => $infra->idInfraestructura,
                        'nombreInfraestructura' => $infra->nombreInfraestructura,
                        'fechaInicial' => $pivot->fechaInicial, // incluir campos adicionales
                        'fechaFinal' => $pivot->fechaFinal, // incluir campos adicionales
                    ];
                });

                $grupo->infraestructura = $infraestructura;
                return $grupo;
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
        $grupo = new Grupo([
            'nombre' => $data['nombre'],
            'fechaInicial' => $data['fechaInicial'],
            'fechaFinal' => $data['fechaFinal'],
            'observacion' => $data['observacion'],
            'idTipoGrupo' => $data['idTipoGrupo'],
            'idLider' => $data['idLider'],
            'idPrograma' => $data['idPrograma'],
            'idNivel' => $data['idNivel'],
            'idTipoFormacion' => $data['idTipoFormacion'],
            'idEstado' => $data['idEstado'],
            'idTipoOferta' => $data['idTipoOferta'],
        ]);
        $grupo->save();

        if (isset($data['infraestructura'])) {
            foreach ($data['infraestructura'] as $horarioGrupoInfraestructura) {
                $info = [
                    'idGrupo' => $grupo->id,
                    'idInfraestructura' => $horarioGrupoInfraestructura['idInfraestructura'],
                    'fechaInicial' => $horarioGrupoInfraestructura['fechaInicial'],
                    'fechaFinal' => $horarioGrupoInfraestructura['fechaFinal']
                ];
                $HorarioGrupoInfraestructura = new HorarioInfraestructuraGrupo($info);
                $HorarioGrupoInfraestructura->save();
            }
        }

        if (isset($data['grupos_jornada'])) {
            foreach ($data['grupos_jornada'] as $grupoJornada) {
                $info = ['idGrupo' => $grupo->id, 'idJornada' => $grupoJornada['idJornada']];
                $GrupoJornada = new AsignacionJornadaGrupo($info);
                $GrupoJornada->save();
            }
        }

        if (isset($data['participantes'])) {
            foreach ($data['participantes'] as $asignacionParticipante) {
                $info = [
                    'idGrupo'        => $grupo->id,
                    'idParticipante' => $asignacionParticipante['idParticipante'],
                    'fechaInicial'   => $asignacionParticipante['fechaInicial'],
                    'fechaFinal'     => $asignacionParticipante['fechaFinal'],
                    'descripcion'    => $asignacionParticipante['descripcion']
                ];
                $asignacionParticipante = new AsignacionParticipante($info);
                $asignacionParticipante->save();
            }
        }

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
        $dato = Grupo::with([
            'infraestructura' => function ($query) {
                $query->withPivot('fechaInicial', 'fechaFinal');
            },
            'gruposJornada',
            'participantes' => function ($query) {
                $query->withPivot('fechaInicial', 'fechaFinal', 'descripcion');
            }
        ])->find($id);

        if (!$dato) {
            return response()->json(['error' => 'El dato no fue encontrado'], 404);
        }

        return $dato->toJson();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models$grupo  $grupo
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $grupo = Grupo::findOrFail($id);
        $grupo->update([
            'nombre' => $data['nombre'],
            'fechaInicial' => $data['fechaInicial'],
            'fechaFinal' => $data['fechaFinal'],
            'observacion' => $data['observacion'],
            'idTipoGrupo' => $data['idTipoGrupo'],
            'idLider' => $data['idLider'],
            'idPrograma' => $data['idPrograma'],
            'idNivel' => $data['idNivel'],
            'idTipoFormacion' => $data['idTipoFormacion'],
            'idEstado' => $data['idEstado'],
            'idTipoOferta' => $data['idTipoOferta'],
        ]);

        // Eliminar todas las asignaciones de infraestructura previas
        HorarioInfraestructuraGrupo::where('idGrupo', $id)->delete();

        // Eliminar todas las asignaciones de jornada previas
        AsignacionJornadaGrupo::where('idGrupo', $id)->delete();

        // Eliminar todas las asignaciones de usuario previas
        AsignacionParticipante::where('idGrupo', $id)->delete();

        if (isset($data['infraestructura'])) {
            foreach ($data['infraestructura'] as $horarioGrupoInfraestructura) {
                $info = [
                    'idGrupo' => $grupo->id,
                    'idInfraestructura' => $horarioGrupoInfraestructura['idInfraestructura'],
                    'fechaInicial' => $horarioGrupoInfraestructura['fechaInicial'],
                    'fechaFinal' => $horarioGrupoInfraestructura['fechaFinal']
                ];
                $HorarioGrupoInfraestructura = new HorarioInfraestructuraGrupo($info);
                $HorarioGrupoInfraestructura->save();
            }
        }

        if (isset($data['grupos_jornada'])) {
            foreach ($data['grupos_jornada'] as $grupoJornada) {
                $info = ['idGrupo' => $grupo->id, 'idJornada' => $grupoJornada['idJornada']];
                $GrupoJornada = new AsignacionJornadaGrupo($info);
                $GrupoJornada->save();
            }
        }

        if (isset($data['participantes'])) {
            foreach ($data['participantes'] as $asignacionParticipante) {
                $info = [
                    'idGrupo'        => $grupo->id,
                    'idParticipante' => $asignacionParticipante['idParticipante'],
                    'fechaInicial'   => $asignacionParticipante['fechaInicial'],
                    'fechaFinal'     => $asignacionParticipante['fechaFinal'],
                    'descripcion'    => $asignacionParticipante['descripcion']
                ];
                $asignacionParticipante = new AsignacionParticipante($info);
                $asignacionParticipante->save();
            }
        }

        return response()->json($grupo, 200);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models$grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     DB::beginTransaction();

    //     try {
    //         $grupo = Grupo::findOrFail($id);
    //         $grupo->horarios()->detach(); // Eliminar registros dependientes en la tabla pivote
    //         $grupo->delete(); // Eliminar registro de grupo
    //         DB::commit();
    //         return response()->json(['message' => 'Registro eliminado correctamente']);
    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         if ($e->getCode() == 23000) {
    //             return response()->json(['error' => 'No se puede eliminar el registro porque existen registros dependientes en otras tablas. Primero debe eliminar los registros dependientes antes de eliminar el grupo.'], 500);
    //         } else {
    //             return response()->json(['error' => 'Ha ocurrido un error al eliminar el registro. Por favor, inténtelo de nuevo más tarde.'], 500);
    //         }
    //     }
    // }

    public function destroy(int $id)
    {
        $newjornada = Grupo::findOrFail($id);
        $newjornada->delete();
        return response()->json([
            'eliminada'
        ]);
    }
}
