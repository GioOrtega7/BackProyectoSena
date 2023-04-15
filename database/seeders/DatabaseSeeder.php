<?php

namespace Database\Seeders;

use App\Models\Dia;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
<<<<<<< HEAD
use App\Models\Jornada;
=======
use App\Models\TipoGrupo;
use App\Models\Grupo;
>>>>>>> e3805782842a9940c72d8b2e0d8bbc0a2af666ae

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $path = 'database/seeders/sql/countries.sql';
        DB::unprepared(file_get_contents($path));
        $path = 'database/seeders/sql/cities.sql';
        DB::unprepared(file_get_contents($path));
        $path = 'database/seeders/sql/statuses.sql';
        DB::unprepared(file_get_contents($path));
        $path = 'database/seeders/sql/identification_types.sql';
        DB::unprepared(file_get_contents($path));
        $path = 'database/seeders/sql/datosTipoTransaccion.sql';
        DB::unprepared(file_get_contents($path));
        $path = 'database/seeders/sql/medio_pago.sql';
        DB::unprepared(file_get_contents($path));
        $path = 'database/seeders/sql/tipo_pago.sql';
        DB::unprepared(file_get_contents($path));

        // $path = 'database/seeders/sql/senaapp.sql';
        // DB::unprepared(file_get_contents($path));


        $this->call(CompanySeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(PersonSeeder::class);
<<<<<<< HEAD
        $this->call(DiaSeeder::class);
=======

        //TipoGrupo::factory(10) -> create();
        //Grupo::factory(10)     -> create();
>>>>>>> e3805782842a9940c72d8b2e0d8bbc0a2af666ae

    }
}
