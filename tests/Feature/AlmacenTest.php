<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Almacen;

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

    public function test_InsertarAlmacen()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this -> post('/almacenes/crearAlmacen',[
            'departamento' => "Maldonado",
            'calle' => "Obes",
            'numero_puerta' => 2221,
            "latitud" => -34.854026,
            "longitud" => -56.19419,
            "telefono" => 94523139,
            "capacidad" => 850 
        ]);

        $response->assertStatus(200);

        $this->assertDatabaseHas('almacenes', [
            'departamento' => "Maldonado",
            'calle' => "Obes",
            'numero_puerta' => 2221,
            "latitud" => -34.854026,
            "longitud" => -56.19419,
            "telefono" => 94523139,
            "capacidad" => 850 
        ]);

        $response->assertViewIs('crearAlmacen');

        $response->assertViewHas('mensaje','Almacén creado correctamente');

        $user->delete();
    }

    public function test_EliminarAlmacenExistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this -> delete('/almacenes/eliminarAlmacen/1000');

        $response->assertStatus(302);

       $this->assertDatabaseMissing('almacenes', [
        'id' => '1000',
        'deleted_at' => null
        ]);

        $response->assertRedirect(route('listarAlmacenes'));

        Almacen::withTrashed()->where("id",1000)->restore();

        $user->delete();
    }

    public function test_EliminarAlmacenInexistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this -> delete('/almacenes/eliminarAlmacen/93223');

        $response->assertStatus(404);

        $user->delete();
    }

    public function test_ModificarAlmacenExistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this -> post('/almacenes/modificarAlmacen/1000',[
            "departamento" => "Durazno",
            "calle" => "Acevedo Diaz",
            "numero_puerta" => 3331,
            "latitud" => -34.898403,
            "longitud" => -56.12882,
            "telefono" => 94418258,
            "capacidad" => 3152
        ]);

        $response->assertStatus(302);

        $this->assertDatabaseHas('almacenes',[
            "departamento" => "Durazno",
            "calle" => "Acevedo Diaz",
            "numero_puerta" => 3331,
            "latitud" => -34.898403,
            "longitud" => -56.12882,
            "telefono" => 94418258,
            "capacidad" => 3152
        ]);

        $response->assertRedirect(route('listarAlmacenes'));

        $user->delete();
    }

    public function test_ModificarAlmacenInexistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this -> post('/almacenes/modificarAlmacen/2130921',[
            "departamento" => "Artigas",
            "calle" => "Gouveia",
            "numero_puerta" => 2112,
            "latitud" => -34.898403,
            "longitud" => -56.12882,
            "telefono" => 94418692,
            "capacidad" => 19282
        ]);

        $response->assertStatus(404);

        $user->delete();

    }
}
