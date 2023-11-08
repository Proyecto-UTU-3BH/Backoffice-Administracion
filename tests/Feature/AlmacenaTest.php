<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Almacena;

class AlmacenaTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_ListarAlmacena()
{
    $user = User::factory()->create();
    $this->actingAs($user);

    $response = $this->get('/listarAlmacena');

    $response->assertStatus(200);

    $response->assertViewIs('listarAlmacena');

    $response->assertViewHas('almacena');
    
    $user->delete();
}

public function test_ListarAlmacenaExistente()
{
    $user = User::factory()->create();
    $this->actingAs($user);

    $response = $this->get('/almacena/modificarAlmacena/750');

    $response->assertStatus(200);

    $response->assertViewIs('modificarAlmacena');

    $response->assertViewHas('almacena');

    $user->delete();
}

public function test_ListarAlmacenaInexistente()
{
    $user = User::factory()->create();
    $this->actingAs($user);

    $response = $this->get('/almacena/modificarAlmacena/77541253');

    $response->assertStatus(404);

    $user->delete();
}

public function test_InsertarAlmacena()
{
    $user = User::factory()->create();
    $this->actingAs($user);

    $response = $this->post('/almacena/almacenar', [
        'almacen_id' => 1000,
        'producto_id' => 1000,
    ]);

    $response->assertStatus(200);

    $this->assertDatabaseHas('almacena', [
        'almacen_id' => 1000,
        'producto_id' => 1000,
    ]);

    $response->assertViewIs('almacenarProducto');

    $response->assertViewHas('mensaje', 'Almacenamiento creado correctamente');

    $user->delete();
}

public function test_EliminarAlmacenaExistente()
{
    $user = User::factory()->create();
    $this->actingAs($user);

    $response = $this->delete('/almacena/eliminarAlmacena/750');

    $response->assertStatus(302);

    $this->assertDatabaseMissing('almacena', [
        'id' => '1000',
    ]);

    $response->assertRedirect(route('listarAlmacena'));

    Almacena::withTrashed()->where("id",750)->restore();

    $user->delete();
}

public function test_EliminarAlmacenaInexistente()
{
    $user = User::factory()->create();
    $this->actingAs($user);

    $response = $this->delete('/almacena/eliminarAlmacena/93223');

    $response->assertStatus(404);

    $user->delete();
}

public function test_ModificarAlmacenaExistente()
{
    $user = User::factory()->create();
    $this->actingAs($user);

    $response = $this->post('/almacena/modificarAlmacena/750', [
        'almacen_id' => 1000,
        'producto_id' => 750,
    ]);

    $response->assertStatus(302);

    $this->assertDatabaseHas('almacena', [
        'almacen_id' => 1000,
        'producto_id' => 750,
    ]);

    $response->assertRedirect(route('listarAlmacena'));

    $user->delete();
}

public function test_ModificarAlmacenaInexistente()
{
    $user = User::factory()->create();
    $this->actingAs($user);

    $response = $this->post('/almacena/modificarAlmacena/2130921', [
        'almacen_id' => 3,
        'producto_id' => 1003,
    ]);

    $response->assertStatus(404);

    $user->delete();
}

}
