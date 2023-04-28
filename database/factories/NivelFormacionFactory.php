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
        $niveles = ['ESPECIALIZACIÓN', 'TECNÓLOGO', 'TÉCNICO'];
        shuffle($niveles); // Reorganizar aleatoriamente la lista de niveles
        $nivelAleatorio = array_pop($niveles); // Seleccionar el último elemento de la lista reorganizada

        return [
            'nivel' => $nivelAleatorio,
        ];
    }
    
}
