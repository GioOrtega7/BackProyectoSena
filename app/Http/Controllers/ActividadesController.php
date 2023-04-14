<?php

namespace App\Http\Controllers;

use App\Models\Actividades;
use Illuminate\Http\Request;

class ActividadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nombreActividades = $request->input('nombreActividades');

        $actividades = Actividades::query();
        if ($nombreActividades) {
            $actividades->where('nombreActividades', $nombreActividades);
        }


        return response()->json($actividades->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = $request->all();
        $actividades= new Actividades($post);
        $actividades->save();
        return response()->json($actividades,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Actividades  $actividades
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $actividades = Actividades::find($id);

        return response()->json($actividades);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Actividades  $actividades
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,int $id)
    {
        $data = $request->all();
        $actividades = Actividades::findOrFail($id);
        $actividades->fill($data);
        $actividades->save();

        return response()->json($actividades);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Actividades  $actividades
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id )
    {
        $actividades = Actividades::findOrFail($id);
        $actividades->delete();
        return response()->json('se elimino');
    }
}
