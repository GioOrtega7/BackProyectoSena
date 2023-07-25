<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                // Aquí puedes definir la ruta donde se guardarán los archivos.
                // Asegúrate de tener los permisos adecuados para esta carpeta.
                $path = public_path('uploads');
                $fileName = $file->getClientOriginalName();

                // Mueve el archivo al directorio especificado.
                $file->move($path, $fileName);
            }

            return response()->json(['message' => 'Archivos subidos con éxito.']);
        }

        return response()->json(['message' => 'No se encontraron archivos para subir.'], 400);
    }


    
}
