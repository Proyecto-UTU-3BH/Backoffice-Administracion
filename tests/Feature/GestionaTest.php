<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Gestiona;

class GestionaTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_ListarGestiona()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/listarLotes');

        $response->assertStatus(200);

        $response->assertViewIs('listarLotes');

        $response->assertViewHas('lotes');
        
        $user->delete();
    }

    public function test_ListarGestionaExistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/gestiona/modificarLote/750');

        $response->assertStatus(200);

        $response->assertViewIs('modificarGestiona');

        $response->assertViewHas('gestiona');

        $user->delete();
    }

    public function test_ListarGestionaInexistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/gestiona/modificarLote/77541253');

        $response->assertStatus(404);

        $user->delete();
    }

    public function test_InsertarGestiona()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/gestiona/asignarLote', [
            'producto_ids' => 1000,
            'usuario_id' => 750,
            'vehiculo_id' => 1000,
            'fecha' => '2023-11-08',
            'IDLote' => 1,
        ]);

        $response->assertStatus(200);

        $this->assertDatabaseHas('gestiona', [
            'producto_id' => 1000,
            'usuario_id' => 750,
            'vehiculo_id' => 1000,
            'fecha' => '2023-11-08',
            'IDLote' => 1,
        ]);

        $response->assertViewIs('asignarLote');

        $response->assertViewHas('mensaje', 'Asignación creada correctamente');

        $user->delete();
    }

    public function test_EliminarGestionaExistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->delete('/gestiona/eliminarGestiona/750');

        $response->assertStatus(302);

        $this->assertDatabaseMissing('gestiona', [
            'id' => '750',
            'deleted_at' => null
        ]);

        $response->assertRedirect(route('listarLotes'));

        Gestiona::withTrashed()->where("id", 750)->restore();

        $user->delete();
    }

    public function test_EliminarGestionaInexistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->delete('/gestiona/eliminarGestiona/93223');

        $response->assertStatus(404);

        $user->delete();
    }

    public function test_ModificarGestionaExistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/gestiona/modificarLote/750', [
            'producto_id' => 750,
            'usuario_id' => 750,
            'vehiculo_id' => 750,
            'fecha' => '2023-11-08',
            'IDLote' => 2,
        ]);

        $response->assertStatus(302);

        $this->assertDatabaseHas('gestiona', [
            'producto_id' => 750,
            'usuario_id' => 750,
            'vehiculo_id' => 750,
            'fecha' => '2023-11-08',
            'IDLote' => 2,
        ]);

        $response->assertRedirect(route('listarLotes'));

        $user->delete();
    }

    public function test_ModificarGestionaInexistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/gestiona/modificarGestiona/2130921', [
            'producto_id' => 1000,
            'usuario_id' => 1000,
            'vehiculo_id' => 1000,
            'fecha' => '2023-11-08',
            'IDLote' => 1,
        ]);

        $response->assertStatus(404);

        $user->delete();
    }

}
