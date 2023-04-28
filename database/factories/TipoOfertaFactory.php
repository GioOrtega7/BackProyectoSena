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

        $tipoOfertas = ['CERRADA', 'ABIERTA'];
        shuffle($tipoOfertas); // Reorganizar aleatoriamente la lista de niveles
        $tipoOfertasAleatorio = array_pop($tipoOfertas); // Seleccionar el último elemento de la lista reorganizada

        return [
            'nombreOferta' => $tipoOfertasAleatorio,
        ];
    }
}
