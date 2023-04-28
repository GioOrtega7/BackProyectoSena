<?php

namespace Database\Factories;

use App\Models\Status;
use App\Models\TipoProgramas;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProgramaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $tipoPrograma  = TipoProgramas::all()->random();
        $estado        = Status::all()->random();
        return [
            'nombrePrograma'       => $this->faker->randomElement(['programa1', 'programa2']),
            'codigoPrograma'       => $this->faker->randomElement(['jqjwhwd8912', 'ifm23f8']),
            'descripcionPrograma'  => $this->faker->randomElement(['Descripcion 1 programa', 'Descripcion 2 programa']),
            'idTipoPrograma'       => $tipoPrograma -> id,
            'idEstado'             => $estado -> id,
        ];
    }
}
