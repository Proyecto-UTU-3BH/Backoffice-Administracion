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

    public function test_InsertarUsuario()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/usuarios/crearUsuario', [
            'name' => 'Alvaro',
            'email' => 'Alvaro@hotmail.com',
            'password' => 'juansito'
        ]);

        $response->assertStatus(200);

        $this->assertDatabaseHas('users', [
            'name' => 'Alvaro',
            'email' => 'Alvaro@hotmail.com'
        ]);

        $response->assertViewIs('crearUsuario');

        $response->assertViewHas('mensaje', 'Usuario creado correctamente');

        $user->delete();
    }

    public function test_EliminarUsuarioExistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->delete("/usuarios/eliminarUsuario/{$user->id}");

        $response->assertStatus(302);

        $this->assertDatabaseMissing('users', [
            'id' => $user->id,
            'deleted_at' => null
        ]);

        $response->assertRedirect(route('listarUsuarios'));

        User::withTrashed()->where('id', $user->id)->restore();

        $user->delete();
    }

    public function test_EliminarUsuarioInexistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->delete('/usuarios/eliminarUsuario/93223');

        $response->assertStatus(404);

        $user->delete();
    }

    public function test_ModificarUsuarioExistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post("/usuarios/modificarUsuario/{$user->id}", [
            "name" => "Philipe",
            "email" => "philipe@hotmail.com",
            "password" => "philipe"
        ]);

        $response->assertStatus(302);

        $this->assertDatabaseHas('users', [
            "name" => "Philipe",
            "email" => "philipe@hotmail.com"
        ]);

        $response->assertRedirect(route('listarUsuarios'));

        $user->delete();
    }

    public function test_ModificarUsuarioInexistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/usuarios/modificarUsuario/999999', [
            "nombre" => "nombre",
            "email" => "correo@hotmail.com",
            "password" => "contrasena"
        ]);

        $response->assertStatus(404);

        $user->delete();
    }

}
