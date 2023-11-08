<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Va;

class VaTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_ListarVa()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/listarVa');

        $response->assertStatus(200);

        $response->assertViewIs('listarVa');

        $response->assertViewHas('va');

        $user->delete();
    }

    public function test_ListarVaExistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/va/modificarVa/750');

        $response->assertStatus(200);

        $response->assertViewIs('modificarVa');

        $response->assertViewHas('va');

        $user->delete();
    }

    public function test_ListarVaInexistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/va/modificarVa/77541253');

        $response->assertStatus(404);

        $user->delete();
    }

    public function test_InsertarVa()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/va/insertarRegistro', [
            'ruta_id' => 1000,
            'almacen_id' => 1000,
            'vehiculo_id' => 1000,
            'fecha' => '2023-11-07',
            'horallegada' => '14:30',
            'horasalida' => '16:00',
        ]);

        $response->assertStatus(200);

        $this->assertDatabaseHas('va', [
            'ruta_id' => 1000,
            'almacen_id' => 1000,
            'vehiculo_id' => 1000,
            'fecha' => '2023-11-07',
            'horallegada' => '14:30:00',
            'horasalida' => '16:00:00',
        ]);

        $response->assertViewIs('insertarVa');

        $response->assertViewHas('mensaje', 'Registro creado correctamente');

        $user->delete();
    }

    public function test_EliminarVaExistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->delete('/va/eliminarVa/750');

        $response->assertStatus(302);

        $this->assertDatabaseMissing('va', [
            'id' => '750',
            'deleted_at' => null
        ]);

        $response->assertRedirect(route('listarVa'));

        Va::withTrashed()->where("id", 750)->restore();

        $user->delete();
    }

    public function test_EliminarVaInexistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->delete('/va/eliminarVa/93223');

        $response->assertStatus(404);

        $user->delete();
    }

    public function test_ModificarVaExistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/va/modificarVa/750', [
            'ruta_id' => 1000,
            'almacen_id' => 750,
            'vehiculo_id' => 750,
            'fecha' => '2023-11-07',
            'horallegada' => '14:30',
            'horasalida' => '17:00',
        ]);

        $response->assertStatus(302);

        $this->assertDatabaseHas('va', [
            'ruta_id' => 1000,
            'almacen_id' => 750,
            'vehiculo_id' => 750,
            'fecha' => '2023-11-07',
            'horallegada' => '14:30:00',
            'horasalida' => '17:00:00',
        ]);

        $response->assertRedirect(route('listarVa'));

        $user->delete();
    }

    public function test_ModificarVaInexistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/va/modificarVa/2130921', [
            'ruta_id' => 3,
            'almacen_id' => 1003,
            'vehiculo_id' => 1003,
            'fecha' => '2023-11-07',
            'horallegada' => '14:30:00',
            'horasalida' => '12:00:00',
        ]);

        $response->assertStatus(404);

        $user->delete();
    }
}

