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
}
