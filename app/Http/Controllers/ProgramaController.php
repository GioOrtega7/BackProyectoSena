<?php

namespace App\Http\Controllers;

use App\Models\Programa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProgramaController extends Controller {

    public function index(Request $request)
    {

        $estado = $request->input('estado');
        $tipoPrograma = $request->input('tipoPrograma');
        $programas = Programa::with('estado','tipoPrograma');


        if($tipoPrograma){
            $programas->whereHas('tipoPrograma',function($q) use ($tipoPrograma){
                return $q->select('id')->where('id',$tipoPrograma)->orWhere('nombreTipoPrograma',$tipoPrograma);
            });
        };

        if($estado){
            $programas->whereHas('estado',function($q) use ($estado){
                return $q->select('id')->where('id',$estado)->orWhere('estado',$estado);
            });
        };

        return response()->json($programas->get());
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $programa = new Programa($data);
        $programa->save();

        return response()->json($programa,201);
    }


    public function show(int $id)
    {
        $programa = Programa::find($id);

        return response()->json($programa,200);
    }


    public function update(Request $request, int  $id)
    {
        $data = $request->all();
        $programa = Programa::findOrFail($id);
        $programa->fill($data);
        $programa->save();

        return response()->json($programa,203);
    }


    public function destroy(int $id)
    {
        $programa = Programa::findOrFail($id);
        $programa->delete();

        return response()->json([],204);
    }
}
