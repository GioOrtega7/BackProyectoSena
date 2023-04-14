<?php

namespace App\Http\Controllers;

use App\Models\ClaseDocumento;
use Illuminate\Http\Request;

class ClaseDocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $estado = $request->input('estado');
        $actividades = $request->input('actividades');
        $claseDocumentos = ClaseDocumento::with('estado', 'actividades');

        if ($estado) {
            $claseDocumentos->whereHas('estado', function ($q) use ($estado) {
                return $q->select('id')->where('id', $estado)->orWhere('estado', $estado);
            });
        }

        if ($actividades) {
            $claseDocumentos->whereHas('actividades', function ($q) use ($actividades) {
                return $q->select('id')->where('id', $actividades)->orWhere('nombreProceso', $actividades);
            });
        }

        return response()->json($claseDocumentos->get());
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
        $claseDocumento = new ClaseDocumento($data);
        $claseDocumento->save();

        return response()->json($claseDocumento, 201);
    }
  

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClaseDocumento  $claseDocumento
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $claseDocumento = ClaseDocumento::find($id);

        return response()->json($claseDocumento);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClaseDocumento  $claseDocumento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $data = $request->all();
        $claseDocumento = ClaseDocumento::findOrFail($id);
        $claseDocumento->fill($data);
        $claseDocumento->save();

        return response()->json($claseDocumento);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClaseDocumento  $claseDocumento
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id )
    {
        $claseDocumento = ClaseDocumento::findOrFail($id);
        $claseDocumento->delete();
        return response()->json('se elimino');
    }
}
