<?php

namespace Tests\Feature;

use App\Models\Pacientes;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PacientesTest extends TestCase
{
    use RefreshDatabase;

    public function test_listado_de_pacientes_carga(): void
    {
        $response = $this->get('/pacientes');
        $response->assertStatus(200);
    }

    public function test_formulario_alta_carga(): void
    {
        $response = $this->get('/paciente_alta');
        $response->assertStatus(500);
    }

    public function test_paciente_puede_ser_creado(): void
    {
        $response = $this->post('/paciente_registrar', [
            'clave'  => 'PAC001',
            'nombre' => 'Juan',
            'app'    => 'Pérez',
            'fn'     => '1990-01-01',
            'sexo'   => 'Masculino',
            'activo' => 1,
        ]);

        $response->assertRedirect(route('pacientes'));
        $this->assertDatabaseHas('pacientes', [
            'clave'  => 'PAC001',
            'nombre' => 'Juan',
        ]);
    }

    public function test_paciente_requiere_campos_obligatorios(): void
    {
        $response = $this->post('/paciente_registrar', []);
        $response->assertSessionHasErrors(['clave', 'nombre', 'app', 'fn', 'sexo']);
    }

    public function test_paciente_puede_ser_borrado(): void
    {
        $paciente = Pacientes::create([
            'clave'  => 'PAC002',
            'nombre' => 'Ana',
            'app'    => 'López',
            'fn'     => '1992-02-02',
            'sexo'   => 'Femenino',
            'foto'   => 'logo_paciente.png',
            'activo' => 1,
        ]);

        $response = $this->get("/paciente_borrar/{$paciente->id_paciente}");
        $response->assertRedirect(route('pacientes'));
        $this->assertDatabaseMissing('pacientes', ['id_paciente' => $paciente->id_paciente]);
    }
}