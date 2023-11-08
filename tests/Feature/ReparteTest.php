<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Reparte;

class ReparteTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_ListarReparte()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
    
        $response = $this->get('/listarRepartos');
    
        $response->assertStatus(200);
    
        $response->assertViewIs('listarRepartos');
    
        $response->assertViewHas('repartos');
        
        $user->delete();
    }
    
    public function test_ListarReparteExistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
    
        $response = $this->get('/reparto/modificarReparto/750');
    
        $response->assertStatus(200);
    
        $response->assertViewIs('modificarReparto');
    
        $response->assertViewHas('reparto');
    
        $user->delete();
    }
    
    public function test_ListarReparteInexistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
    
        $response = $this->get('/reparto/modificarReparto/77541253');
    
        $response->assertStatus(404);
    
        $user->delete();
    }
    
    public function test_InsertarReparte()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
    
        $response = $this->post('/reparto/insertarReparto', [
            'vehiculo_id' => 1000,
            'producto_id' => 1000,
            'almacen_id' => 1000,
            'fechaReparto' => '2023-11-01',
            'fechaRealizacion' => '2023-11-01',
        ]);
    
        $response->assertStatus(200);
    
        $this->assertDatabaseHas('reparte', [
            'vehiculo_id' => 1000,
            'producto_id' => 1000,
            'almacen_id' => 1000,
            'fechaReparto' => '2023-11-01',
            'fechaRealizacion' => '2023-11-01',
        ]);
    
        $response->assertViewIs('insertarReparto');
    
        $response->assertViewHas('mensaje', 'Reparto creado correctamente');
    
        $user->delete();
    }
    
    public function test_EliminarReparteExistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
    
        $response = $this->delete('/reparto/eliminarReparto/750');
    
        $response->assertStatus(302);
    
        $this->assertDatabaseMissing('reparte', [
            'id' => '750',
            'deleted_at' => null
        ]);
    
        $response->assertRedirect(route('listarRepartos'));
    
        Reparte::withTrashed()->where("id", 750)->restore();
    
        $user->delete();
    }
    
    public function test_EliminarReparteInexistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
    
        $response = $this->delete('/reparto/eliminarReparto/93223');
    
        $response->assertStatus(404);
    
        $user->delete();
    }
    
    public function test_ModificarReparteExistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
    
        $response = $this->post('/reparto/modificarReparto/750', [
            'vehiculo_id' => 1000,
            'producto_id' => 750,
            'almacen_id' => 1000,
            'fechaReparto' => '2023-11-02',
            'fechaRealizacion' => '2023-11-02',
        ]);
    
        $response->assertStatus(302);
    
        $this->assertDatabaseHas('reparte', [
            'vehiculo_id' => 1000,
            'producto_id' => 750,
            'almacen_id' => 1000,
            'fechaReparto' => '2023-11-02',
            'fechaRealizacion' => '2023-11-02',
        ]);
    
        $response->assertRedirect(route('listarRepartos'));
    
        $user->delete();
    }
    
    public function test_ModificarReparteInexistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
    
        $response = $this->post('/reparto/modificarReparto/2130921', [
            'vehiculo_id' => 3,
            'producto_id' => 1003,
            'almacen_id' => 1000,
            'fechaReparto' => '2023-11-08',
            'fechaRealizacion' => '2023-11-15',
        ]);
    
        $response->assertStatus(404);
    
        $user->delete();
    }
    
}
