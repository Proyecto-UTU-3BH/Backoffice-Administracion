<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VehiculoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'matricula' => $this-> faker->bothify('???####'),
            'capacidad' => $this-> faker->randomFloat(2, 0, 10000),
            'estado' => $this-> faker -> randomElement($array = array ('en almacen','en transito')),
            'tipo' => $this-> faker -> randomElement($array = array ('flete','reparto'))
        ];
    }
}
