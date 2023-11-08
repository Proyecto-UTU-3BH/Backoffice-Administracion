<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RealizaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ruta_id' => 750,
            'vehiculo_id' => 750,
        ];
    }
}
