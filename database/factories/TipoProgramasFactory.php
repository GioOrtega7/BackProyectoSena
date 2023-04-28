<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TipoProgramasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombreTipoPrograma' => $this->faker->randomElement(['TIPO DE PROGRAMA 1', 'TIPO DE PROGRAMA 2']),
            'descripcion'        => $this->faker->randomElement(['DESCRIPCION 1', 'DESCRIPCION 2']),
        ];
    }
}
