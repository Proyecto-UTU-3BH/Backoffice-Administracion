<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GestionaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'vehiculo_id' => 750,
            'producto_id' => 750,
            'usuario_id' => 750,
            'fecha' => $this->faker->date($format = 'Y-m-d', $max = '2023-12-01'),
            'IDLote' => $this->faker->numberBetween($min = 1, $max = 1000)
        ];
    }
}
