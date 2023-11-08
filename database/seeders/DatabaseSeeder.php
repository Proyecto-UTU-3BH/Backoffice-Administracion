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
        /* \App\Models\Ruta::factory(5)->create();
         \App\Models\Ruta::factory(1)->create(
            [ "id" => 750]
        );
        \App\Models\Ruta::factory(1)->create(
            [ "id" => 1000]
        );

        \App\Models\User::factory(1)->create(
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
        
    }
}
