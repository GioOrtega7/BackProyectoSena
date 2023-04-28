<?php

namespace App\Http\Controllers;

use App\Models\regional;
use Illuminate\Http\Request;

class RegionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nombreRegional = $request->input('nombreRegional');

        $regionales = regional::query();
        if ($nombreRegional) {
            $regionales->where('nombreRegional', $nombreRegional);
        }

        return response()->json($regionales->get());
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
        $regional = new regional($data);
        $regional->save();

        return response()->json($regional, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $regional = regional::find($id);
        return response()->json($regional);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $data = $request->all();
        $regional = regional::findOrFail($id);
        $regional->fill($data);
        $regional->save();

        return response()->json($regional);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $regional = regional::findOrFail($id);
        $regional->delete();

        return response()->json([], 204);
    }
}
