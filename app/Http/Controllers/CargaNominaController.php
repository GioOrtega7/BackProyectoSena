<?php

namespace App\Http\Controllers;

use App\Models\cargaNomina;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;



class CargaNominaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        
      




    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function prueba(Request $request){

        

    // Validar si se envió un archivo
    if (!$request->hasFile('excelFile')) {
        return response()->json(['error' => 'No se envió ningún archivo'], 400);
    }
    
    // Obtener el archivo
    $file = $request->file('excelFile');
    
    // Validar el tipo de archivo
    if ($file->getClientOriginalExtension() !== 'xlsx') {
        return response()->json(['error' => 'El archivo debe ser de tipo XLSX'], 400);
    }
    
    // Crear una instancia del lector de archivos de Excel
    $reader = IOFactory::createReader('Xlsx');
    
    // Cargar el archivo en un objeto Spreadsheet
    $documento = $reader->load($file->getPathname());
    
    // Obtener la primera hoja del documento
    $hojaActual = $documento->getSheet(0);
    
    // Obtener el rango de celdas no vacías
    $cellRange = $hojaActual->calculateWorksheetDimension();
    
    // Iterar por cada fila (empezando desde la segunda fila)
    foreach ($hojaActual->getRowIterator(2) as $fila) {
        $datosFila = [];
        
        // Iterar por cada celda en la fila actual
        foreach ($fila->getCellIterator() as $celda) {
            $datosFila[] = $celda->getValue();
        }
        
        // Crear una instancia de CargaNomina y asignar los valores de las celdas
        $cargaNomina = new CargaNomina;
        $cargaNomina->cedula = $datosFila[0];
        $cargaNomina->nombres = $datosFila[1];
        $cargaNomina->apellidos = $datosFila[2];
        $cargaNomina->descripcionGrupoPrototipos = $datosFila[3];
        $cargaNomina->descripcionCargo = $datosFila[4];
        $cargaNomina->nombreCentroCosto = $datosFila[5];
        $cargaNomina->fechaInicio = $datosFila[6];
        $cargaNomina->fechaVencimiento = $datosFila[7];
        $cargaNomina->sueldoBasico = $datosFila[8];
        $cargaNomina->estado = $datosFila[9];
        
        $cargaNomina->save();
    }
    
    return response()->json(['message' => 'Archivo importado correctamente']);






    }


    public function import(Request $request){

        // Validar si se envió un archivo
        if ($request->hasFile('excelFile')) {
        // Obtener el archivo
        $file = $request->file('excelFile');
        
        // Validar el tipo de archivo (opcional)
            if ($file->getClientOriginalExtension() !== 'xlsx') {
            return response()->json(['error' => 'El archivo debe ser de tipo XLSX'], 400);
            }
        }
        // Crear una instancia del lector de archivos de Excel
        $reader = IOFactory::createReader('Xlsx');
        
        // Cargar el archivo en un objeto Spreadsheet
        $documento = $reader->load($file->getPathname());

        //$nombreArchivo='C:\xampp\htdocs\senaWebBack\nomina2.xlsx';
        //$documento = IOFactory::load($nombreArchivo);

        $totalHojas = $documento->getSheetCount();

        //for($indiceHoja = 0; $indiceHoja<$totalHojas; $indiceHoja++){
        $hojaActual = $documento->getSheet(0);
        $numeroFilas = $hojaActual ->getHighestDataRow();
        $letra = $hojaActual->getHighestColumn();

        $numeroLetra = Coordinate::columnIndexFromString($letra); 
        for($indiceFila=1;$indiceFila<=$numeroFilas;$indiceFila++){
           
           
           $valorA = $hojaActual->getCellByColumnAndRow(1, $indiceFila)->getValue();
           $valorB = $hojaActual->getCellByColumnAndRow(2, $indiceFila)->getValue();
           $valorC = $hojaActual->getCellByColumnAndRow(3, $indiceFila)->getValue();
           $valorD = $hojaActual->getCellByColumnAndRow(4, $indiceFila)->getValue();
           $valorE = $hojaActual->getCellByColumnAndRow(5, $indiceFila)->getValue();
           $valorF = $hojaActual->getCellByColumnAndRow(6, $indiceFila)->getValue();
           $valorG = $hojaActual->getCellByColumnAndRow(7, $indiceFila)->getValue();
           $valorH = $hojaActual->getCellByColumnAndRow(8, $indiceFila)->getValue();
           $valorI = $hojaActual->getCellByColumnAndRow(9, $indiceFila)->getValue();
           $valorJ = $hojaActual->getCellByColumnAndRow(10, $indiceFila)->getValue();
   
           $cargaNomina = new CargaNomina;
           $cargaNomina->cedula = $valorA;
           $cargaNomina->nombres = $valorB;
           $cargaNomina->apellidos = $valorC;
           $cargaNomina->descripcionGrupoPrototipos = $valorD;
           $cargaNomina->descripcionCargo = $valorE;
           $cargaNomina->nombreCentroCosto = $valorF;
           $cargaNomina->fechaInicio = $valorG;
           $cargaNomina->fechaVencimiento = $valorH;
           $cargaNomina->sueldoBasico = $valorI;
           $cargaNomina->estado = $valorJ;
   
           $cargaNomina->save();
           $value='EXITO';


            }

            return response()->json(['message' => 'Archivo importado correctamente', 'value' => $value]);
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cargaNomina  $cargaNomina
     * @return \Illuminate\Http\Response
     */
    public function show(String $cedula)
    {
        $user = cargaNomina::where('cedula', $cedula)->first();
    
        if (!$user) {
        return response()->json(['message' => 'La cédula no existe en la base de datos'], 404);
        }else{
            return response()->json($user);

        }
    
        
        
        //$user = cargaNomina::where('cedula', $cedula)->first();
        //return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cargaNomina  $cargaNomina
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cargaNomina $cargaNomina)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cargaNomina  $cargaNomina
     * @return \Illuminate\Http\Response
     */
    public function destroy(cargaNomina $cargaNomina)
    {
        //
    }

     //public function import(Request $request)
    //{
       // $file = $request->file('excelFile');

        // Aquí puedes utilizar phpoffice/phpspreadsheet para leer los datos del archivo
        // y procesarlos según tus necesidades (por ejemplo, guardarlos en la base de datos).

       // return response()->json(['message' => 'Archivo importado correctamente']);
    //}
}
