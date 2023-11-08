<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReparteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'producto_id' => 750,
            'vehiculo_id' => 750,
            'almacen_id' => 750,
            'fechaReparto' => $this->faker->date($format = 'Y-m-d', $max = '2023-12-01'),
            'fechaRealizacion' => $this->faker->date($format = 'Y-m-d', $max = '2023-12-01'),
        ];
    }
}
