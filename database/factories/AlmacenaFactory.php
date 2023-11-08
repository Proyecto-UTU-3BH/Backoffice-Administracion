<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AlmacenaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'almacen_id' => 750,
            'producto_id' => 750,
        ];
    }
}
