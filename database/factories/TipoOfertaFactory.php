<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TipoOfertaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombreOferta' => $this->faker->randomElement(['ABIERTA', 'CERRADA']),
        ];
    }
}
