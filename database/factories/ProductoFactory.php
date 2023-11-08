<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'peso' => $this-> faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 9999),
            'estado' => $this-> faker->randomElement($array = array ('en central','en transito','almacen final','en domicilio')),
            'destino' => $this-> faker-> city(),
            'tipo' => $this-> faker-> 
            randomElement($array = array ('Carta','Sobre chico','Sobre grande','Paquete chico','Paquete mediano','Paquete grande','Otro')),
            'forma_entrega' => $this-> faker-> 
            randomElement($array = array ('pick up','reparto')),
            'remitente' => $this-> faker-> firstName(),
            'nombre_destinatario' => $this-> faker-> firstName(),
            'calle' => $this-> faker->streetName(),
            'numero_puerta' => $this-> faker->buildingNumber(),
            'codRastreo' => $this->faker->regexify('[A-Z0-9]{6}'),
        ];
    }
}
