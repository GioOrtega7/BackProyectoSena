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
            'nombreTipoPrograma' => $this->faker->randomElement(['tipo de programa prueba 1', 'tipo de programa prueba 2']),
            'descripcion'        => $this->faker->randomElement(['descripcion de tipo programa 1', 'descripcion de tipo programa 2']),
        ];
    }
}
