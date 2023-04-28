<?php

namespace App\Http\Controllers;

use App\Http\Controllers\controller;
use App\Models\CentroFormacion;
use Illuminate\Http\Request;

class CentroFormacionController extends Controller
{
    
    public function index(Request $request)
    {
        $regional = $request->input('regional');
        $AP = CentroFormacion::with('regional');


        if($regional){
            $AP->whereHas('regional',function($q) use ($regional){
                return $q->select('id')->where('id',$regional)->orWhere('nombreRegional',$regional);
            });
        };

        return response()->json($AP->get());
    }

    
    public function store(Request $request)
    {
        $data = $request->all();
        $AP = new CentroFormacion($data);
        $AP->save();

        return response()->json($AP,201);
    }

    
    public function show(int $id)
    {
        $AP = CentroFormacion::find($id);
        
        return response()->json($AP,200);
    }

    
    public function update(Request $request, int $id)
    {
        $data = $request->all();
        $AP = CentroFormacion::findOrFail($id);
        $AP->fill($data);
        $AP->save();

        return response()->json($AP,203);
    }

    
    public function destroy(int $id)
    {
        $AP = CentroFormacion::findOrFail($id);
        $AP->delete();

        return response()->json(['eliminado con exito']);
    }
}
