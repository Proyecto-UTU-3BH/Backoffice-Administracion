<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Parada;

class ParadaTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testVistaCrearParada()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get("/rutas/crearParada/750");

        $response->assertStatus(200);

        $response->assertViewIs('crearParada');

        $response->assertViewHas('idRuta', 750);

        $user->delete();
    }

    public function testVistaVerParadas()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get("/rutas/verParadas/750");

        $response->assertStatus(200);
    
        $response->assertViewIs('verParadas');

        $response->assertViewHas('idRuta', 750);

        $user->delete();
    }

    public function test_InsertarParada()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/rutas/crearParada', [
            'ruta_id' => 750,
            'latitud' => -34.854026,
            'longitud' => -56.19419
        ]);

        $response->assertStatus(200);

        $this->assertDatabaseHas('paradas', [
            'ruta_id' => 750,
            'latitud' => -34.854026,
            'longitud' => -56.19419
        ]);

        $response->assertViewIs('crearParada');

        $response->assertViewHas('mensaje', 'Parada creada correctamente');
        $response->assertViewHas('idRuta', 750);

        $user->delete();
    }

}
