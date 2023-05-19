<?php

namespace Database\Seeders;

use App\Models\Infraestructura;
use Illuminate\Database\Seeder;

class InfraestructuraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->saveInfraestructura('sofware 1',30,'sala de computadores',1,1);
        $this->saveInfraestructura('cocina',25,'sala para preparacion de alimentos',1,2);
        $this->saveInfraestructura('gimnasio',15,'sala para actividad fisica',1,3);
        $this->saveInfraestructura('salon 1',30,'sala para fichas academicas',1,4);
        $this->saveInfraestructura('teatro',30,'sala de reuniones',1,5);

        $this->saveInfraestructura('sofware 2',30,'sala de computadores',2,1);
        $this->saveInfraestructura('almacen',25,'sala para almacen de alimentos',2,2);
        $this->saveInfraestructura('cancha',15,'sala para actividad fisica',2,3);
        $this->saveInfraestructura('salon 3',30,'sala para fichas academicas',2,4);
        $this->saveInfraestructura('auditorio',30,'sala de reuniones',2,5);

        $this->saveInfraestructura('sofware 3',30,'sala de computadores',3,1);
        $this->saveInfraestructura('restaurante',25,'sala para preparacion y consumo de alimentos',3,2);
        $this->saveInfraestructura('pista de patinaje',15,'sala para actividad fisica',3,3);
        $this->saveInfraestructura('salon 22',30,'sala para fichas academicas',3,4);
        $this->saveInfraestructura('teatro',30,'sala de reuniones',3,5);

        $this->saveInfraestructura('sofware 4',30,'sala de computadores',4,1);
        $this->saveInfraestructura('cafeteria',25,'sala para el consumo y preparacion de alimentos',4,2);
        $this->saveInfraestructura('cancha de tenis',15,'sala para actividad fisica',4,3);
        $this->saveInfraestructura('salon 2',30,'sala para fichas academicas',4,4);
        $this->saveInfraestructura('auditorio',30,'sala de reuniones',4,5);

        $this->saveInfraestructura('sofware 5',30,'sala de computadores',5,1);
        $this->saveInfraestructura('cocina 2',25,'sala para almacen de alimentos',5,2);
        $this->saveInfraestructura('cancha',15,'sala para actividad fisica',5,3);
        $this->saveInfraestructura('salon 55',30,'sala para fichas academicas',5,4);
        $this->saveInfraestructura('conferencias',30,'sala de reuniones con proyector',5,5);
    }

    private function saveInfraestructura(
        string $nombreInfraestructura, 
        int $capacidad,
        string $descripcion,
        int $idSede,
        int $idArea
        )
    {
        $infraestructura = new Infraestructura();
        $infraestructura->nombreInfraestructura = $nombreInfraestructura;
        $infraestructura->capacidad= $capacidad;
        $infraestructura->descripcion=$descripcion;
        $infraestructura->idSede=$idSede;
        $infraestructura->idArea=$idArea;
        $infraestructura->save();
    }
}
