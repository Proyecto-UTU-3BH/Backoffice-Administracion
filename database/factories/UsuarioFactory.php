<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UsuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'usuario' => $this-> faker->email(),
            'ci' => $this-> faker->numerify('########'),
            'password' => Hash::make($this-> faker->password),
            'primer_nombre' => $this-> faker->firstName(),
            'primer_apellido' => $this-> faker->lastname(),
            'segundo_apellido' => $this-> faker->optional()->lastname(),
            'calle' => $this-> faker->streetName(),
            'numero_de_puerta' => $this-> faker->buildingNumber(),
            'tipo' => $this-> faker-> randomElement($array = array ('chofer','funcionario')),
            'telefono' => $this-> faker-> numberBetween($min = 94000000, $max = 94999999),
            'almacen_id' =>$this->faker->optional($weight = 0.9, null)->randomElement([750, null])
        ];
    }
}
