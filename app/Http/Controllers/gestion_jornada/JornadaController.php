<?php

namespace App\Http\Controllers\gestion_jornada;

use App\Http\Controllers\Controller;
use App\Models\Jornada;
use Illuminate\Http\Request;
use App\Models\DiaJornada;

class JornadaController extends Controller
{
    public function index()
    {
        $date = Jornada::with('diaJornada')->get();
        return response()->json($date);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $jornada = new Jornada($data);
        $jornada->save();

        foreach ($request->diaJornada as $val) {
            foreach ($val as $val2) {
                $info = ['idJornada' => $jornada->id, 'idDia' => $val2];
                $diaJornada = new DiaJornada($info);
                $diaJornada->save();
            }
        }

    }

    public function update(Request $request, int $id)
    {
        $data = $request->all();
        $jornada = Jornada::findOrFail($id);
        $jornada->fill($data);
        $jornada->save();

        DiaJornada::where('idJornada', $jornada->id)->delete();

        foreach ($request->diaJornada as $val) {
            foreach ($val as $val2) {
                $info = ['idJornada' => $jornada->id, 'idDia' => $val2];
                $diaJornada = new DiaJornada($info);
                $diaJornada->save();
            }
        }
    }

    public function destroy(int $id)
    {
        $newjornada = Jornada::findOrFail($id);
        $newjornada->delete();
        return response()->json([
            'eliminda'
        ]);
    }
}
