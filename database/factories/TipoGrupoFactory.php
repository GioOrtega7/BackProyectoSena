<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TipoGrupoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombreTipoGrupo'  => $this->faker->randomElement(['FICHA', 'ESPECIAL', 'EVENTO']),
        ];
    }
}
