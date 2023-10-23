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

    public function test_InsertarUsuario()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/usuarios/crearUsuario', [
            'usuario' => 'soychofer@yahoo.com',
            'ci' => '41559752',
            'primer_nombre' => 'Rafael',
            'primer_apellido' => 'Gonzalez',
            'segundo_apellido' => 'Knappe',
            'calle' => 'Graciela de Gouveia',
            'numero_de_puerta' => '602',
            'tipo' => 'chofer',
            'password' => 'juansito'
        ]);

        $response->assertStatus(200);

        $this->assertDatabaseHas('users', [
            'usuario' => 'soychofer@yahoo.com',
            'ci' => '41559752',
            'primer_nombre' => 'Rafael',
            'primer_apellido' => 'Gonzalez',
            'segundo_apellido' => 'Knappe',
            'calle' => 'Graciela de Gouveia',
            'numero_de_puerta' => '602',
            'tipo' => 'chofer',
        ]);

        $response->assertViewIs('crearUsuario');

        $response->assertViewHas('mensaje', 'Usuario creado correctamente');

        $user->delete();
    }

    public function test_EliminarUsuarioExistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this -> delete('/usuarios/eliminarUsuario/1000');

        $response->assertStatus(302);

       $this->assertDatabaseMissing('usuarios', [
        'id' => '1000',
        'deleted_at' => null
        ]);

        $response->assertRedirect(route('listarUsuarios'));

        Usuario::withTrashed()->where("id",1000)->restore();

        $user->delete();
    }

    public function test_EliminarUsuarioInexistente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this -> delete('/usuarios/eliminarUsuario/321321');

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
