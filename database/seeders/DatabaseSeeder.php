<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
        );*/

        /*\App\Models\User::factory(1)->create(
            [ "id" => 1000,
            "name" => "Admin",
            "email" => "contra12345678@gmail.com",
            "password" =>Hash::make("12345678")
            ]
        );

        \App\Models\User::factory(1)->create(
            [ "id" => 1000,
            "name" => "Gonzalo",
            "email" => "gonza@gmail.com",
            "password" =>Hash::make("12345678")
            ]
        );

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

        \App\Models\Reparte::factory(1)->create(
            [ "id" => 750]
        );

        \App\Models\Va::factory(1)->create(
            [ "id" => 750]
        );

        DB::table('usuarios')->insert([
            [
                'usuario' => 'chofer1@example.com',
                'password' => Hash::make('12345678'),
                'ci' => '12345678',
                'primer_nombre' => 'Juan',
                'primer_apellido' => 'Gómez',
                'segundo_apellido' => 'Pérez',
                'calle' => 'Calle Alegre',
                'numero_de_puerta' => '1234',
                'tipo' => 'chofer',
                'telefono' => '987654321',
            ],
            [
                'usuario' => 'chofer2@example.com',
                'password' => Hash::make('12345678'),
                'ci' => '23456789',
                'primer_nombre' => 'María',
                'primer_apellido' => 'Rodríguez',
                'segundo_apellido' => 'López',
                'calle' => 'Calle Bella Vista',
                'numero_de_puerta' => '5678',
                'tipo' => 'chofer',
                'telefono' => '654321987',
            ],
            [
                'usuario' => 'chofer3@example.com',
                'password' => Hash::make('12345678'),
                'ci' => '34567890',
                'primer_nombre' => 'Pedro',
                'primer_apellido' => 'Fernández',
                'segundo_apellido' => 'González',
                'calle' => 'Calle del Sol',
                'numero_de_puerta' => '91011',
                'tipo' => 'chofer',
                'telefono' => '123456789',
            ],
            [
                'usuario' => 'chofer4@example.com',
                'password' => Hash::make('12345678'),
                'ci' => '45678901',
                'primer_nombre' => 'Sofía',
                'primer_apellido' => 'Martínez',
                'segundo_apellido' => 'Silva',
                'calle' => 'Calle de la Luna',
                'numero_de_puerta' => '1213',
                'tipo' => 'chofer',
                'telefono' => '789012345',
            ],
            [
                'usuario' => 'chofer5@example.com',
                'password' => Hash::make('12345678'),
                'ci' => '56789012',
                'primer_nombre' => 'Alejandro',
                'primer_apellido' => 'Gómez',
                'segundo_apellido' => 'Torres',
                'calle' => 'Calle de las Flores',
                'numero_de_puerta' => '1415',
                'tipo' => 'chofer',
                'telefono' => '345678901',
            ],
            [
                'usuario' => 'chofer6@example.com',
                'password' => Hash::make('12345678'),
                'ci' => '67890123',
                'primer_nombre' => 'Gabriela',
                'primer_apellido' => 'Pérez',
                'segundo_apellido' => 'Ramos',
                'calle' => 'Calle de los Ángeles',
                'numero_de_puerta' => '1617',
                'tipo' => 'chofer',
                'telefono' => '901234567',
            ],
            [
                'usuario' => 'chofer7@example.com',
                'password' => Hash::make('12345678'),
                'ci' => '78901234',
                'primer_nombre' => 'Lucía',
                'primer_apellido' => 'Rodríguez',
                'segundo_apellido' => 'Torres',
                'calle' => 'Calle de los Sueños',
                'numero_de_puerta' => '1819',
                'tipo' => 'chofer',
                'telefono' => '234567890',
            ],
            [
                'usuario' => 'chofer8@example.com',
                'password' => Hash::make('12345678'),
                'ci' => '89012345',
                'primer_nombre' => 'Diego',
                'primer_apellido' => 'López',
                'segundo_apellido' => 'Gómez',
                'calle' => 'Calle del Río',
                'numero_de_puerta' => '2021',
                'tipo' => 'chofer',
                'telefono' => '876543210',
            ],
            [
                'usuario' => 'chofer9@example.com',
                'password' => Hash::make('12345678'),
                'ci' => '90123456',
                'primer_nombre' => 'Valeria',
                'primer_apellido' => 'Martínez',
                'segundo_apellido' => 'Fernández',
                'calle' => 'Calle de la Paz',
                'numero_de_puerta' => '2223',
                'tipo' => 'chofer',
                'telefono' => '543210987',
            ],
            [
                'usuario' => 'chofer10@example.com',
                'password' => Hash::make('12345678'),
                'ci' => '12301230',
                'primer_nombre' => 'Martín',
                'primer_apellido' => 'Fernández',
                'segundo_apellido' => 'López',
                'calle' => 'Calle de los Olivos',
                'numero_de_puerta' => '2425',
                'tipo' => 'chofer',
                'telefono' => '210987654',
            ],
            [
                'usuario' => 'chofer11@example.com',
                'password' => Hash::make('12345678'),
                'ci' => '23012301',
                'primer_nombre' => 'Ana',
                'primer_apellido' => 'Gómez',
                'segundo_apellido' => 'Torres',
                'calle' => 'Calle del Sol',
                'numero_de_puerta' => '2627',
                'tipo' => 'chofer',
                'telefono' => '890123456',
            ],
            [
                'usuario' => 'chofer12@example.com',
                'password' => Hash::make('12345678'),
                'ci' => '30123012',
                'primer_nombre' => 'Carlos',
                'primer_apellido' => 'Silva',
                'segundo_apellido' => 'Martínez',
                'calle' => 'Calle de los Sueños',
                'numero_de_puerta' => '2829',
                'tipo' => 'chofer',
                'telefono' => '567890123',
            ],
            [
                'usuario' => 'chofer13@example.com',
                'password' => Hash::make('12345678'),
                'ci' => '40123023',
                'primer_nombre' => 'Mariana',
                'primer_apellido' => 'Torres',
                'segundo_apellido' => 'Rodríguez',
                'calle' => 'Calle de las Flores',
                'numero_de_puerta' => '3031',
                'tipo' => 'chofer',
                'telefono' => '234567890',
            ],
            [
                'usuario' => 'chofer14@example.com',
                'password' => Hash::make('12345678'),
                'ci' => '50123034',
                'primer_nombre' => 'Luis',
                'primer_apellido' => 'Rodríguez',
                'segundo_apellido' => 'Gómez',
                'calle' => 'Calle del Río',
                'numero_de_puerta' => '3233',
                'tipo' => 'chofer',
                'telefono' => '901234567',
            ],
            [
                'usuario' => 'chofer15@example.com',
                'password' => Hash::make('12345678'),
                'ci' => '60123045',
                'primer_nombre' => 'Rafael',
                'primer_apellido' => 'Fernández',
                'segundo_apellido' => 'Pérez',
                'calle' => 'Calle de la Paz',
                'numero_de_puerta' => '3435',
                'tipo' => 'chofer',
                'telefono' => '876543210',
            ],
            [
                'usuario' => 'chofer16@example.com',
                'password' => Hash::make('12345678'),
                'ci' => '70123056',
                'primer_nombre' => 'Natalia',
                'primer_apellido' => 'Silva',
                'segundo_apellido' => 'Martínez',
                'calle' => 'Calle de la Luna',
                'numero_de_puerta' => '3637',
                'tipo' => 'chofer',
                'telefono' => '543210987',
            ],
            [
                'usuario' => 'chofer17@example.com',
                'password' => Hash::make('12345678'),
                'ci' => '80123067',
                'primer_nombre' => 'Juan',
                'primer_apellido' => 'Fernández',
                'segundo_apellido' => 'Gómez',
                'calle' => 'Calle de los Olivos',
                'numero_de_puerta' => '3839',
                'tipo' => 'chofer',
                'telefono' => '210987654',
            ],
            [
                'usuario' => 'chofer18@example.com',
                'password' => Hash::make('12345678'),
                'ci' => '90123078',
                'primer_nombre' => 'Valentina',
                'primer_apellido' => 'Martínez',
                'segundo_apellido' => 'Pérez',
                'calle' => 'Calle del Río',
                'numero_de_puerta' => '4041',
                'tipo' => 'chofer',
                'telefono' => '890123456',
            ],
            [
                'usuario' => 'chofer19@example.com',
                'password' => Hash::make('12345678'),
                'ci' => '01234089',
                'primer_nombre' => 'Martín',
                'primer_apellido' => 'Pérez',
                'segundo_apellido' => 'Torres',
                'calle' => 'Calle de la Paz',
                'numero_de_puerta' => '4243',
                'tipo' => 'chofer',
                'telefono' => '567890123',
            ],
            [
                'usuario' => 'chofer20@example.com',
                'password' => Hash::make('12345678'),
                'ci' => '12340901',
                'primer_nombre' => 'Carolina',
                'primer_apellido' => 'Silva',
                'segundo_apellido' => 'Fernández',
                'calle' => 'Calle de las Flores',
                'numero_de_puerta' => '4445',
                'tipo' => 'chofer',
                'telefono' => '234567890',
            ],
        ]);

        for ($i = 1; $i <= 15; $i++) {
            DB::table('vehiculos')->insert([
                'matricula' => 'FLE' . $i.$i,
                'capacidad' => rand(5000, 10000) / 100,
                'estado' => 'en almacen',
                'tipo' => 'flete',
            ]);
        }

        for ($i = 1; $i <= 15; $i++) {
            DB::table('vehiculos')->insert([
                'matricula' => 'REP' . $i.$i,
                'capacidad' => rand(3000, 6000) / 100,
                'estado' => 'en almacen',
                'tipo' => 'reparto',
            ]);
        }*/

        DB::table('productos')->insert([
            [
                'codRastreo' => strtoupper(Str::random(6)),
                'peso' => rand(1, 10000) / 100,
                'estado' => 'en domicilio',
                'destino' => 'Rivera',
                'tipo' => 'Paquete chico',
                'forma_entrega' => 'reparto',
                'remitente' => 'Juan',
                'nombre_destinatario' => 'Romina',
                'calle' => 'Calle1',
                'numero_puerta' => '1234',
            ],
            [
                'codRastreo' => strtoupper(Str::random(6)),
                'peso' => rand(1, 10000) / 10,
                'estado' => 'en domicilio',
                'destino' => 'Rivera',
                'tipo' => 'Paquete mediano',
                'forma_entrega' => 'pick up',
                'remitente' => 'Romina',
                'nombre_destinatario' => 'Juana',
                'calle' => 'Calle2',
                'numero_puerta' => '3113',
            ],
            [
                'codRastreo' => strtoupper(Str::random(6)),
                'peso' => rand(1, 10000) / 10,
                'estado' => 'en domicilio',
                'destino' => 'Rivera',
                'tipo' => 'Carta',
                'forma_entrega' => 'pick up',
                'remitente' => 'Hector',
                'nombre_destinatario' => 'Ronald',
                'calle' => 'Calle2',
                'numero_puerta' => '3113',
            ],
            [
                'codRastreo' => strtoupper(Str::random(6)),
                'peso' => rand(1, 10000) / 10,
                'estado' => 'en domicilio',
                'destino' => 'Rivera',
                'tipo' => 'Otro',
                'forma_entrega' => 'pick up',
                'remitente' => 'Mario',
                'nombre_destinatario' => 'Francisco',
                'calle' => 'Calle2',
                'numero_puerta' => '5678',
            ]

        ]);
        
    }
}
