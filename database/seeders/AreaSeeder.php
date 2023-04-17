<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this ->saveArea('TICS','1');
        $this ->saveArea('COCINA','2');
        $this ->saveArea('LUDICA','3');
        $this ->saveArea('ACADEMICO','4');
        $this ->saveArea('OTROS','5');

    }

    private function saveArea(string $nombreArea, string $codigo)
    {
        $area = new Area();
        $area->nombreArea = $nombreArea;
        $area->codigo= $codigo;
        $area->save();
    }
}
