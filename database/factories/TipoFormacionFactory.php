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

        $tipoFormaciones = ['PRESENCIAL', 'VIRTUAL'];
        shuffle($tipoFormaciones); // Reorganizar aleatoriamente la lista de niveles
        $tipoFormacionesAleatorio = array_pop($tipoFormaciones); // Seleccionar el último elemento de la lista reorganizada

        return [
            'nombreTipoFormacion' => $tipoFormacionesAleatorio,
        ];
    }
}
