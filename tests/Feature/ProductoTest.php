<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Producto;

class ProductoTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_ListarProductos()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
    
        $response = $this->get('/listarProductos');
    
        $response->assertStatus(200);
    
        $response->assertViewIs('listarProductos');
    
        $response->assertViewHas('productos');
        
        $user->delete();
    }
    
    public function test_ListarProductoExistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
    
        $response = $this ->get('/productos/modificarProducto/750');
    
        $response->assertStatus(200);
    
        $response->assertViewIs('modificarProducto');
    
        $response->assertViewHas('producto');
    
        $user->delete();
    }
    
    public function test_ListarProductoInexistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
    
        $response = $this ->get('/productos/modificarProducto/77541253');
    
        $response->assertStatus(404);
    
        $user->delete();
    }

    public function test_InsertarProducto()
{
    $user = User::factory()->create();
    $this->actingAs($user);

    $response = $this -> post('/productos/crearProducto', [
        'peso' => 102.00,
        'estado' => "En transito",
        'destino' => "Flores",
        'tipo' => "Paquete grande"
    ]);

    $response->assertStatus(200);

    $this->assertDatabaseHas('productos', [
        'peso' => 102.00,
        'estado' => "En transito",
        'destino' => "Flores",
        'tipo' => "Paquete grande"
    ]);

    $response->assertViewIs('crearProducto');

    $response->assertViewHas('mensaje', 'Producto creado correctamente');

    $user->delete();
}

    public function test_EliminarProductoExistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this -> delete('/productos/eliminarProducto/1000');

        $response->assertStatus(302);

        $this->assertDatabaseMissing('productos', [
            'id' => '1000',
            'deleted_at' => null
        ]);

        $response->assertRedirect(route('listarProductos'));

        Producto::withTrashed()->where("id",1000)->restore();

        $user->delete();
    }

    public function test_EliminarProductoInexistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this -> delete('/productos/eliminarProducto/93223');

        $response->assertStatus(404);

        $user->delete();
    }

    public function test_ModificarProductoExistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this -> post('/productos/modificarProducto/1000', [
            "peso" => 73.00,
            "estado" => "En transito",
            "destino" => "Rio Negro",
            "tipo" => "Paquete mediano"
        ]);

        $response->assertStatus(302);

        $this->assertDatabaseHas('productos', [
            "peso" => 73.00,
            "estado" => "En transito",
            "destino" => "Rio Negro",
            "tipo" => "Paquete mediano"
        ]);

        $response->assertRedirect(route('listarProductos'));

        $user->delete();
    }

    public function test_ModificarProductoInexistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this -> post('/productos/modificarProducto/2130921', [
            "peso" => 73.00,
            "estado" => "En transito",
            "destino" => "Rio Negro",
            "tipo" => "Paquete mediano"
        ]);

        $response->assertStatus(404);

        $user->delete();
    }

}
