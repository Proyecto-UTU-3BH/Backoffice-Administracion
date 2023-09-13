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

    public function test_InsertarRuta()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $estructura = [
            'destino' => 'Montevideo',
            'recorrido' => 100,
        ];

        $response = $this->post('/rutas/crearRuta', $estructura);

        $response->assertStatus(200);
        $this->assertDatabaseHas('ruta', $estructura);
        $response->assertViewIs('crearRuta');
        $response->assertViewHas('mensaje', 'Ruta creada correctamente');

        $user->delete();
    }

    public function test_EliminarRutaExistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->delete('/rutas/eliminarRuta/1000'); 

        $response->assertStatus(302);

        $this->assertDatabaseMissing('ruta', [
            'id' => '1000',
            'deleted_at' => null
        ]);

        $response->assertRedirect(route('listarRutas'));

        Ruta::withTrashed()->where("id", 1000)->restore();

        $user->delete();
    }

    public function test_EliminarRutaInexistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->delete('/rutas/eliminarRuta/342432'); 

        $response->assertStatus(404);

        $user->delete();
    }

    public function test_ModificarRutaExistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $estructura = [
            'destino' => 'Maldonado',
            'recorrido' => 123,
        ];

        $response = $this->post('/rutas/modificarRuta/1000', $estructura);

        $response->assertStatus(302);
        $this->assertDatabaseHas('ruta', $estructura);

        $response->assertRedirect(route('listarRutas'));

        $user->delete();
    }

    public function test_ModificarRutaInexistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $estructura = [
            'destino' => 'Maldonado',
            'recorrido' => 123,
        ];

        $response = $this->post('/rutas/modificarRuta/991399', $estructura);

        $response->assertStatus(404);

        $user->delete();
    }
    
}


