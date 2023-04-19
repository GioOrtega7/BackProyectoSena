<?php

namespace Database\Seeders;

use App\Models\Sede;
use Illuminate\Database\Seeder;

class SedeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->saveSede('cc y s','calle 4','3312245456','frente al parqueadero',1);
        $this->saveSede('cc y q','calle 6','3121234554','frente a bomberos',2);
        $this->saveSede('cc y r','calle 7','3121253531','frente a terraplaza',3);
        $this->saveSede('cc y l','calle 9','3121253544','frente al exito',4);
        $this->saveSede('cc y g','calle 22','3121253988','frente al terminal',5);
    }
    private function saveSede(
        string $nombreSede, 
        string $direccion,
        string $telefono,
        string $descripcion,
        int $idCiudad)
    {
        $sede = new Sede();
        $sede->nombreSede = $nombreSede;
        $sede->direccion= $direccion;
        $sede->telefono=$telefono;
        $sede->descripcion=$descripcion;
        $sede->$idCiudad=$idCiudad;
        $sede->save();
    }
}
