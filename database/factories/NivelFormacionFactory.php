<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class NivelFormacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nivel' => $this->faker->randomElement(['ESPECIALIZACIÓN', 'TECNÓLOGO', 'TÉCNICO']),
        ];
    }
}
