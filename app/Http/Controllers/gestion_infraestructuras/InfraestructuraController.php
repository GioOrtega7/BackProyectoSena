<?php

namespace App\Http\Controllers\gestion_infraestructuras;

use App\Http\Controllers\Controller;
use App\Models\Infraestructura;
use Illuminate\Http\Request;

class InfraestructuraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = InfraEstructura::with([
            'sede',
            'area'
        ]) -> get();
        return response() -> json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $test = json_decode($request->getContent(),false);
        if(is_array($test)){
            $data = $request -> all();
            foreach ($data as $item) {
                $infr = new Infraestructura();
                $infr = $this -> guardarInfr($item);
                $infr -> save();
            }
            return response() -> json($data);
        }
        if(is_object($test)){
            $data = $request -> all();
            $infr = new Infraestructura();
            $infr = $this -> guardarInfr($data);
            $infr -> save();
            return response() -> json($data);
        }
    }

    private function guardarInfr(Array $data){
            //guarda la fecha para usarla en el nombre de los ficheros
            $fecha_actual = date('YmdHis') . '_' . substr(microtime(), 2, 3);
            //la imagen en base64 proveniente desde la solicitud json
            $qrRequest = $data['newQr'];
            //nombre que le daremos al archivo
            $fileQrName=$data['nombreInfraestructura'].'_'.$fecha_actual.'_Qr.png';
            
            // Decodificar la imagen base64 a su representación binaria
            $qr_data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $qrRequest));

            // Crear un recurso de imagen a partir de la representación binaria
            $qrImage = imagecreatefromstring($qr_data);

            // Obtener la ruta completa del archivo de imagen
            $path = storage_path('app/public/images/infraestructuras/qrcode/' . $fileQrName);

            // Asegurarse de que la carpeta exista
            if (!file_exists(dirname($path))) {
                mkdir(dirname($path), 0777, true);
            }

            //guarda la ruta para incluirla en el campo codigoQr de infraestructuras
            $data['codigoQr']='app/public/images/infraestructuras/qrcode' . $fileQrName;
            // Crear una imagen PNG a partir del recurso de imagen
            imagepng($qrImage, $path);

            $infr = new Infraestructura([
                'nombreInfraestructura' => $data['nombreInfraestructura'],
                'capacidad' => $data['capacidad'],
                'codigoQr' => $data['codigoQr'],
                'descripcion'=> $data['descripcion'],
                'idSede' => $data['idSede'],
                'idArea' => $data['idArea']
            ]);
            return $infr;     
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $infraestructura = InfraEstructura::with(['sede','area']) -> find($id);
        return response() -> json($infraestructura);
    }
     /**
     * Muestra las infraestructuras dependiendo de la sede
     */
    public function showBySede(int $id){
        $infraestructuras = Infraestructura::with(['sede','area'])
            -> where('idSede',$id)
            -> get();

        return response() -> json($infraestructuras);
    }
    /**
     * Muestra las infraestructuras dependiendo de la area
     */
    public function showByArea(int $id){
        $infraestructuras = Infraestructura::with(['sede','area'])
            -> where('idArea',$id)
            -> get();

        return response() -> json($infraestructuras);
    }
    /**
     * Muestra las infraestructuras dependiendo de la sede y la ciudad
     */
    public function showBySedeArea(int $idSede,int $idArea){
        $infraestructuras = Infraestructura::with(['sede','area'])
            -> where('idSede',$idSede)
            -> where('idArea',$idArea)
            -> get();

        return response() -> json($infraestructuras);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $request -> validate([
            'nombreInfraestructura' => 'required',
            'capacidad' => 'required',
            'idArea' => 'required',
            'idSede' => 'required'
        ]);

        $registro = InfraEstructura::findOrFail($id);

        $registro -> nombreInfraestructura = $request -> nombreInfraestructura;
        $registro -> capacidad = $request -> capacidad;
        $registro -> descripcion = $request -> descripcion;
        $registro -> idArea = $request -> idArea;
        $registro -> idSede = $request -> idSede;

        $registro -> save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $infraestructura = InfraEstructura::findOrFail($id);
        $infraestructura -> delete();

    }
}
