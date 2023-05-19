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
        $estados = ['ACTIVO', 'FINALIZADO', 'CAIDA'];
        shuffle($estados);  // Reorganizar aleatoriamente la lista de estados
        $estadoAleatorio = array_pop($estados);  // Seleccionar el último elemento de la lista reorganizada

        return [
            'nombreEstado' => $estadoAleatorio,
        ];
    }
}
