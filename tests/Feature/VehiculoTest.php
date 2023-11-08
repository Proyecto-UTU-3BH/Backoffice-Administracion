<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Vehiculo;

class VehiculoTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
   /* public function test_ListarVehiculos()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/listarVehiculos');

        $response->assertStatus(200);
        $response->assertViewIs('listarVehiculos');
        $response->assertViewHas('vehiculos');

        $user->delete();
    }

    public function test_ListarVehiculoExistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/vehiculos/modificarVehiculo/750'); 

        $response->assertStatus(200);
        $response->assertViewIs('modificarVehiculo');
        $response->assertViewHas('vehiculo');

        $user->delete();
    }

    public function test_ListarVehiculoInexistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/vehiculos/modificarVehiculo/992991'); 

        $response->assertStatus(404);

        $user->delete();
    }

    public function test_InsertarVehiculo()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $estructura = [
            'matricula' => 'DPJ1234',
            'tipo' => 'flete',
            'estado' => 'en transito',
            'capacidad' => 12.34,
        ];

        $response = $this->post('/vehiculos/crearVehiculo', $estructura);

        $response->assertStatus(200);
        $this->assertDatabaseHas('vehiculos', $estructura);
        $response->assertViewIs('crearVehiculo');
        $response->assertViewHas('mensaje', 'Vehículo creado correctamente');

        $user->delete();
    }

    public function test_EliminarVehiculoExistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->delete('/vehiculos/eliminarVehiculo/1000'); 

        $response->assertStatus(302);

        $this->assertDatabaseMissing('vehiculos', [
            'id' => '1000',
            'deleted_at' => null
        ]);

        $response->assertRedirect(route('listarVehiculos'));

        Vehiculo::withTrashed()->where("id",1000)->restore();

        $user->delete();
    }

    public function test_EliminarVehiculoInexistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->delete('/vehiculos/eliminarVehiculo/993299'); 

        $response->assertStatus(404);

        $user->delete();
    }

    public function test_ModificarVehiculoExistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $estructura = [
            'matricula' => 'rgk7777',
            'tipo' => 'reparto',
            'estado' => 'en almacen',
            'capacidad' => 45.67,
        ];

        $response = $this->post('/vehiculos/modificarVehiculo/1', $estructura);

        $response->assertStatus(302);
        $this->assertDatabaseHas('vehiculos', $estructura);

        $response->assertRedirect(route('listarVehiculos'));

        $user->delete();
    }

    public function test_ModificarVehiculoInexistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $estructura = [
            'matricula' => 'zzzz1111',
            'tipo' => 'reparto',
            'estado' => 'en almacen',
            'capacidad' => 45.67,
        ];

        $response = $this->post('/vehiculos/modificarVehiculo/991399', $estructura); 

        $response->assertStatus(404);

        $user->delete();
    }*/
}

