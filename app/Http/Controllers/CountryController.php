<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data =Country::with('ciudades') -> get();
        return response() -> json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data =Country::with('ciudades') -> find($id);
        return response() -> json($data);
    }
}
