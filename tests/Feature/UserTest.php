<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_ListarUsuarios()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/listarUsuarios');

        $response->assertStatus(200);

        $response->assertViewIs('listarUsuarios');

        $response->assertViewHas('usuarios');
        
        $user->delete();
    }

    public function test_ListarUsuarioExistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this ->get("/usuarios/modificarUsuario/{$user->id}");

        $response->assertStatus(200);

        $response->assertViewIs('modificarUsuario');

        $response->assertViewHas('usuario');

        $user->delete();
    }

    public function test_ListarUsuarioInexistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this ->get('/usuarios/modificarUsuario/77541253');

        $response->assertStatus(404);

        $user->delete();
    }

}
