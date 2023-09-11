<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\Ruta::factory(15)->create();
         \App\Models\Ruta::factory(1)->create(
            [ "id" => 750]
        );
        \App\Models\Ruta::factory(1)->create(
            [ "id" => 1000]
        );
    }
}
