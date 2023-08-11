<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class AlmacenTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_ListarAlmacenes()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/listarAlmacenes');

        $response->assertStatus(200);

        $response->assertViewIs('listarAlmacenes');

        $response->assertViewHas('almacenes');
        
        $user->delete();
    }

    public function test_ListarAlmacenExistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this ->get('/almacenes/modificarAlmacen/750');

        $response->assertStatus(200);

        $response->assertViewIs('modificarAlmacen');

        $response->assertViewHas('almacen');

        $user->delete();
    }

    public function test_ListarAlmacenInexistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this -> get('/almacenes/modificarAlmacen/77541253');

        $response->assertStatus(404);

        $user->delete();
    }
}
