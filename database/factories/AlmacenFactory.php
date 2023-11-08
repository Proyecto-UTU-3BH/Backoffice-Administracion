<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AlmacenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'latitud' => $this-> faker->latitude($min = -30, $max = -35),
            'longitud' => $this-> faker->longitude($min = -53, $max = -59),
            'telefono' => $this-> faker-> numberBetween($min = 94000000, $max = 94999999),
            'capacidad' => $this-> faker-> numberBetween($min = 100, $max = 10000),
            'calle' => $this-> faker->streetName(),
            'numero_puerta' => $this-> faker->buildingNumber(),
            'departamento' => $this-> faker-> city()
        ];
    }
}
