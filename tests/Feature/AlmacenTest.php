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

   /* public function test_EliminarAlmacenExistente()
    {
        $response = $this -> delete('/almacenes/eliminarAlmacen/1000');

        $response->assertStatus(200);

        $response->assertJsonFragment([
            "mensaje" => "El almacen con id 1000 ha sido eliminado correctamente"
        ]);

       $this->assertDatabaseMissing('almacenes', [
        'id' => '1000',
        'deleted_at' => null
        ]);

        Almacen::withTrashed()->where("id",1000)->restore();
    }

    public function test_EliminarAlmacenInexistente()
    {
        $response = $this -> delete('/api/almacenes/93223');

        $response->assertStatus(404);
    }*/
}
