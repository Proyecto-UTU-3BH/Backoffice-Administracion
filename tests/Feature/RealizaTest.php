<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Realiza;

class RealizaTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_ListarRealiza()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/listarRealiza');

        $response->assertStatus(200);

        $response->assertViewIs('listarRealiza');

        $response->assertViewHas('realiza');
        
        $user->delete();
    }

    public function test_ListarRealizaExistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/realiza/modificarRealiza/750');

        $response->assertStatus(200);

        $response->assertViewIs('modificarRealiza');

        $response->assertViewHas('realiza');

        $user->delete();
    }

    public function test_ListarRealizaInexistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/realiza/modificarRealiza/77541253');

        $response->assertStatus(404);

        $user->delete();
    }

    public function test_InsertarRealiza()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/realiza/insertarRealiza', [
            'ruta_id' => 1000,
            'vehiculo_id' => 1000,
        ]);

        $response->assertStatus(200);

        $this->assertDatabaseHas('realiza', [
            'ruta_id' => 1000,
            'vehiculo_id' => 1000,
        ]);

        $response->assertViewIs('insertarRealiza');

        $response->assertViewHas('mensaje', 'Registro creado correctamente');

        $user->delete();
    }

    public function test_EliminarRealizaExistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->delete('/realiza/eliminarRealiza/750');

        $response->assertStatus(302);

        $this->assertDatabaseMissing('realiza', [
            'id' => '750',
            'deleted_at' => null
        ]);

        $response->assertRedirect(route('listarRealiza'));

        Realiza::withTrashed()->where("id",750)->restore();

        $user->delete();
    }

    public function test_EliminarRealizaInexistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->delete('/realiza/eliminarRealiza/93223');

        $response->assertStatus(404);

        $user->delete();
    }

    public function test_ModificarRealizaExistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/realiza/modificarRealiza/750', [
            'ruta_id' => 1000,
            'vehiculo_id' => 750,
        ]);

        $response->assertStatus(302);

        $this->assertDatabaseHas('realiza', [
            'ruta_id' => 1000,
            'vehiculo_id' => 750,
        ]);

        $response->assertRedirect(route('listarRealiza'));

        $user->delete();
    }

    public function test_ModificarRealizaInexistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/realiza/modificarRealiza/2130921', [
            'ruta_id' => 3,
            'vehiculo_id' => 1003,
        ]);

        $response->assertStatus(404);

        $user->delete();
    }

}
