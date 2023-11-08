<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\Ruta::factory(5)->create();
         \App\Models\Ruta::factory(1)->create(
            [ "id" => 750]
        );
        \App\Models\Ruta::factory(1)->create(
            [ "id" => 1000]
        );

        /*\App\Models\User::factory(1)->create(
            [ "name" => "Logiker",
            "email" => "logiker@gmail.com",
            "password" =>Hash::make("12345678")
            ]
        );*/

        \App\Models\Almacen::factory(5)->create();
        \App\Models\Almacen::factory(1)->create(
            [ "id" => 750]
        );
        \App\Models\Almacen::factory(1)->create(
            [ "id" => 1000]
        );

        \App\Models\Producto::factory(5)->create();
        \App\Models\Producto::factory(1)->create(
            [ "id" => 750]
        );
        \App\Models\Producto::factory(1)->create(
            [ "id" => 1000]
        );

        \App\Models\Almacena::factory(1)->create(
            [ "id" => 750]
        );

        \App\Models\Vehiculo::factory(5)->create();
        \App\Models\Vehiculo::factory(1)->create(
            [ "id" => 750]
        );
        \App\Models\Vehiculo::factory(1)->create(
            [ "id" => 1000]
        );

        \App\Models\Usuario::factory(5)->create();
        \App\Models\Usuario::factory(1)->create(
            [ "id" => 750,
            "tipo" =>"funcionario",
            "almacen_id" =>750]
        );
        \App\Models\Usuario::factory(1)->create(
            [ "id" => 1000,
            "tipo"=>"chofer",
            "almacen_id"=>null]
        );

        \App\Models\Gestiona::factory(1)->create(
            [ "id" => 750]
        );

        \App\Models\Maneja::factory(1)->create(
            [ "id" => 750]
        );

        \App\Models\Realiza::factory(1)->create(
            [ "id" => 750]
        );

        \App\Models\Parada::factory(1)->create(
            [ "id" => 750]
        );
        
    }
}
