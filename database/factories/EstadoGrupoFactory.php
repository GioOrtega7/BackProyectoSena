<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EstadoGrupoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombreEstado' => $this->faker->randomElement(['ACTIVO', 'FINALIZADO', 'CAIDA']),
        ];
    }
}
