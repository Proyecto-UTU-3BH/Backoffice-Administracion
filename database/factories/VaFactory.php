<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VaFactory extends Factory
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
            'almacen_id' => 750,
            'fecha' => $this->faker->date($format = 'Y-m-d', $max = '2023-11-07'),
            'horallegada' => $this->faker->time($format = 'H:i:s'),
            'horasalida' => $this->faker->time($format = 'H:i:s')
        ];
    }
}
