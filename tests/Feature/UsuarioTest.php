<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Usuario;

class UsuarioTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_ListarUsuarioExistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/usuarios/modificarUsuario/750');

        $response->assertStatus(200);
        $response->assertViewIs('modificarUsuario');
        $response->assertViewHas('usuario');

        $user->delete();
    }

    public function test_ListarUsuarioInexistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/usuarios/modificarUsuario/999999');

        $response->assertStatus(404);

        $user->delete();
    }

    public function test_ModificarUsuarioExistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/usuarios/modificarUsuario/1000', [
            "usuario" => "manuel@gmail.com",
            "ci" => "32145678",
            "password" => "nuevopassword",
            "password_confirmation" => "nuevopassword",
            "primer_nombre" => "Manu",
            "primer_apellido" => "Ugarte",
            "segundo_apellido" => "Gimenez",
            "calle" => "Videla",
            "numero_de_puerta" => "321",
            "tipo" => "chofer"
        ]);

        $response->assertStatus(302);

        $this->assertDatabaseHas('usuarios', [
            "usuario" => "manuel@gmail.com",
            "ci" => "32145678",
            "primer_nombre" => "Manu",
            "primer_apellido" => "Ugarte",
            "segundo_apellido" => "Gimenez",
            "calle" => "Videla",
            "numero_de_puerta" => "321",
            "tipo" => "chofer"
        ]);

        $response->assertRedirect(route('listarUsuarios'));

        $user->delete();
    }

    public function test_ModificarUsuarioInexistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/usuarios/modificarUsuario/999999', [
            "usuario" => "nuevoemail@example.com",
            "ci" => "12345678",
            "password" => "nuevopassword",
            "password_confirmation" => "nuevopassword",
            "primer_nombre" => "NuevoNombre",
            "primer_apellido" => "NuevoApellido",
            "segundo_apellido" => "NuevoSegundoApellido",
            "calle" => "NuevaCalle",
            "numero_de_puerta" => "NuevaPuerta123",
            "tipo" => "chofer"
        ]);

        $response->assertStatus(404);

        $user->delete();
    }

}
