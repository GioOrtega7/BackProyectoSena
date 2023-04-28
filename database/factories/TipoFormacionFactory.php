<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TipoFormacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombreTipoFormacion' => $this->faker->randomElement(['PRESENCIAL', 'VIRTUAL']),
        ];
    }
}
