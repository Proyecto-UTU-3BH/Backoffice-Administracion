<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Maneja;

class ManejaTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_ListarManeja()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/listarManeja');

        $response->assertStatus(200);

        $response->assertViewIs('listarManeja');

        $response->assertViewHas('maneja');
        
        $user->delete();
    }

    public function test_ListarManejaExistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/maneja/modificarManeja/750');

        $response->assertStatus(200);

        $response->assertViewIs('modificarManeja');

        $response->assertViewHas('maneja');

        $user->delete();
    }

    public function test_ListarManejaInexistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/maneja/modificarManeja/77541253');

        $response->assertStatus(404);

        $user->delete();
    }

    public function test_InsertarManeja()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/maneja/manejar', [
            'usuario_id' => 1000,
            'vehiculo_id' => 1000,
        ]);

        $response->assertStatus(200);

        $this->assertDatabaseHas('maneja', [
            'usuario_id' => 1000,
            'vehiculo_id' => 1000,
        ]);

        $response->assertViewIs('insertarManeja');

        $response->assertViewHas('mensaje', 'Conducción creada correctamente');

        $user->delete();
    }

    public function test_EliminarManejaExistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->delete('/maneja/eliminarManeja/750');

        $response->assertStatus(302);

        $this->assertDatabaseMissing('maneja', [
            'id' => '750',
            'deleted_at' => null
        ]);

        $response->assertRedirect(route('listarManeja'));

        Maneja::withTrashed()->where("id",750)->restore();

        $user->delete();
    }

    public function test_EliminarManejaInexistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->delete('/maneja/eliminarManeja/93223');

        $response->assertStatus(404);

        $user->delete();
    }

    public function test_ModificarManejaExistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/maneja/modificarManeja/750', [
            'usuario_id' => 1000,
            'vehiculo_id' => 750,
        ]);

        $response->assertStatus(302);

        $this->assertDatabaseHas('maneja', [
            'usuario_id' => 1000,
            'vehiculo_id' => 750,
        ]);

        $response->assertRedirect(route('listarManeja'));

        $user->delete();
    }

    public function test_ModificarManejaInexistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/maneja/modificarManeja/2130921', [
            'usuario_id' => 3,
            'vehiculo_id' => 1003,
        ]);

        $response->assertStatus(404);

        $user->delete();
    }

}
