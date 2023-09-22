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

        $response = $this->get('/listarAdmins');

        $response->assertStatus(200);

        $response->assertViewIs('listarAdmins');

        $response->assertViewHas('usuarios');
        
        $user->delete();
    }

    public function test_ListarUsuarioExistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this ->get("/admins/modificarAdmin/{$user->id}");

        $response->assertStatus(200);

        $response->assertViewIs('modificarAdmin');

        $response->assertViewHas('usuario');

        $user->delete();
    }

    public function test_ListarUsuarioInexistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this ->get('/admins/modificarAdmin/77541253');

        $response->assertStatus(404);

        $user->delete();
    }

    public function test_InsertarUsuario()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/admins/crearAdmin', [
            'name' => 'Alvaro',
            'email' => 'Alvar76@hotmail.com',
            'password' => 'juansito'
        ]);

        $response->assertStatus(200);

        $this->assertDatabaseHas('users', [
            'name' => 'Alvaro',
            'email' => 'Alvar76@hotmail.com'
        ]);

        $response->assertViewIs('crearAdmin');

        $response->assertViewHas('mensaje', 'Admin creado correctamente');

        $user->delete();
    }

    public function test_EliminarUsuarioExistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->delete("/admins/eliminarAdmin/{$user->id}");

        $response->assertStatus(302);

        $this->assertDatabaseMissing('users', [
            'id' => $user->id,
            'deleted_at' => null
        ]);

        $response->assertRedirect(route('listarAdmins'));

        User::withTrashed()->where('id', $user->id)->restore();

        $user->delete();
    }

    public function test_EliminarUsuarioInexistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->delete('/admins/eliminarAdmin/93223');

        $response->assertStatus(404);

        $user->delete();
    }

    public function test_ModificarUsuarioExistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post("/admins/modificarAdmin/{$user->id}", [
            "name" => "Philipe",
            "email" => "philipe55@hotmail.com",
            "password" => "philipe"
        ]);

        $response->assertStatus(302);

        $this->assertDatabaseHas('users', [
            "name" => "Philipe",
            "email" => "philipe55@hotmail.com"
        ]);

        $response->assertRedirect(route('listarAdmins'));

        $user->delete();
    }

    public function test_ModificarUsuarioInexistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/admins/modificarAdmin/999999', [
            "nombre" => "nombre",
            "email" => "correo@hotmail.com",
            "password" => "contrasena"
        ]);

        $response->assertStatus(404);

        $user->delete();
    }

}
