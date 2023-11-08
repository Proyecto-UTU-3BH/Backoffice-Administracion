<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ManejaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'usuario_id' => 1000,
            'vehiculo_id' => 750,
        ];
    }
}
