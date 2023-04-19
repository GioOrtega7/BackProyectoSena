<?php

namespace Database\Factories;

use App\Models\TipoGrupo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class GrupoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $tipoGrupo = TipoGrupo::all()->random();
        return [
            'nombre'      => $this->faker->randomElement(['GRUPO 1', 'GRUPO 2']),
            'fechaInicial' => $this->faker->randomElement(['2012/12/12', '2018/12/12']),
            'fechaFinal' => $this->faker->randomElement(['2020/12/10', '2021/12/10']),
            'observacion'  => strtoupper($this->faker->text()),
            'idTipoGrupo'   => $tipoGrupo -> id,
        ];
    }
}
