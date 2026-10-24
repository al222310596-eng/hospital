<?php

use Illuminate\Support\Facades\Route;

// Asegúrate de que el nombre del controlador aquí coincida con el nombre que estás usando en las rutas
use App\Http\Controllers\ControladorHospitales;
use App\Http\Controllers\ControladorMedicos;
use App\Http\Controllers\ControladorPacientes;
use App\Http\Controllers\ControladorAtenciones;


Route::get('/', function () {
    return view('welcome');
}); // Cerrar la línea con punto y coma

//----------------------- hospitales --------------------------//
Route::name('hospitales')->get('/hospitales', [ControladorHospitales::class, 'hospitales']);
Route::name('hospital_alta')->get('/hospital_alta', [ControladorHospitales::class, 'hospital_alta']);
Route::name('hospital_registrar')->post('/hospital_registrar', [ControladorHospitales::class, 'hospital_registrar']);

Route::name('hospital_detalle')->get('/hospital_detalle/{id}', [ControladorHospitales::class, 'hospital_detalle']);
Route::name('hospital_editar')->get('/hospital_editar/{id}', [ControladorHospitales::class, 'hospital_editar']);
Route::name('hospital_salvar')->put('/hospital_salvar/{id}', [ControladorHospitales::class, 'hospital_salvar']);
Route::name('hospital_borrar')->get('/hospital_borrar/{id}', [ControladorHospitales::class, 'hospital_borrar']);

//----------------------- medicos --------------------------//
Route::name('medicos')->get('/medicos', [ControladorMedicos::class, 'medicos']);
Route::name('medico_alta')->get('/medico_alta', [ControladorMedicos::class, 'medico_alta']);
Route::name('medico_registrar')->post('/medico_registrar', [ControladorMedicos::class, 'medico_registrar']);

Route::name('medico_detalle')->get('/medico_detalle/{id}', [ControladorMedicos::class, 'medico_detalle']);
Route::name('medico_editar')->get('/medico_editar/{id}', [ControladorMedicos::class, 'medico_editar']);
Route::name('medico_salvar')->put('/medico_salvar/{id}', [ControladorMedicos::class, 'medico_salvar']);
Route::name('medico_borrar')->get('/medico_borrar/{id}', [ControladorMedicos::class, 'medico_borrar']);

//----------------------- pacientes --------------------------//
Route::name('pacientes')->get('/pacientes', [ControladorPacientes::class, 'pacientes']);
Route::name('paciente_alta')->get('/paciente_alta', [ControladorPacientes::class, 'paciente_alta']);
Route::name('paciente_registrar')->post('/paciente_registrar', [ControladorPacientes::class, 'paciente_registrar']);

Route::name('paciente_detalle')->get('/paciente_detalle/{id}', [ControladorPacientes::class, 'paciente_detalle']);
Route::name('paciente_editar')->get('/paciente_editar/{id}', [ControladorPacientes::class, 'paciente_editar']);
Route::name('paciente_salvar')->put('/paciente_salvar/{id}', [ControladorPacientes::class, 'paciente_salvar']);
Route::name('paciente_borrar')->get('/paciente_borrar/{id}', [ControladorPacientes::class, 'paciente_borrar']);

//----------------------- Rutas: atencion----------------------------------//
Route::name('atenciones')->get('/atenciones', [ControladorAtenciones::class, 'atenciones']);
Route::name('atencion_registrar')->post('/atencion_registrar', [ControladorAtenciones::class, 'atencion_registrar']); // Corregido a POST
Route::name('atencion_borrar')->get('/atencion_borrar/{id}', [ControladorAtenciones::class, 'atencion_borrar']);
