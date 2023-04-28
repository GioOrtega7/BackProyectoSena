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

        $tipoGrupos = ['FICHA', 'ESPECIAL', 'EVENTO'];
        shuffle($tipoGrupos); // Reorganizar aleatoriamente la lista de niveles
        $tipoGruposAleatorio = array_pop($tipoGrupos); // Seleccionar el último elemento de la lista reorganizada

        return [
            'nombreTipoGrupo' => $tipoGruposAleatorio,
        ];
    }
}
