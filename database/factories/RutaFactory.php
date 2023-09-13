<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RutaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'destino' => $this->faker->city,
            'recorrido' => $this->faker->numberBetween($min = 1, $max = 500)
        ];
    }
}
