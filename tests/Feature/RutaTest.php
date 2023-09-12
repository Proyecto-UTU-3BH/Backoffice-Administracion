<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Ruta;

class RutaTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_ListarRutas()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/listarRutas');

        $response->assertStatus(200);
        $response->assertViewIs('listarRutas');
        $response->assertViewHas('rutas');

        $user->delete();
    }

    public function test_ListarRutaExistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/rutas/modificarRuta/750'); 

        $response->assertStatus(200);
        $response->assertViewIs('modificarRuta');
        $response->assertViewHas('ruta');

        $user->delete();
    }

    public function test_ListarRutaInexistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/rutas/modificarRuta/42425'); 

        $response->assertStatus(404);

        $user->delete();
    }
}


