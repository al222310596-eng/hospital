<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hospitales;
use App\Models\Medicos;
use App\Models\Pacientes;
use App\Models\Atenciones;

class ControladorAtenciones extends Controller
{
    public function atenciones()
    {
        // Traer todas las atenciones con sus relaciones
        $atenciones = Atenciones::with(['hospital', 'medico', 'paciente'])->get();

        return view('atenciones')
            ->with(['hospitales' => Hospitales::all()])
            ->with(['medicos' => Medicos::all()])
            ->with(['pacientes' => Pacientes::all()])
            ->with(['atenciones' => $atenciones]); // Pasar las atenciones con las relaciones
    }

    public function atencion_registrar(Request $request)
    {
        Atenciones::create([
            'id_hospital' => $request->input('id_hospital'),
            'id_medico' => $request->input('id_medico'),
            'id_paciente' => $request->input('id_paciente'),
            'detalle' => $request->input('detalle'),
        ]);

        return redirect()->route('atenciones');
    }

    public function atencion_borrar($id)
    {
        $atencion = Atenciones::findOrFail($id);
        $atencion->delete();

        return redirect()->route('atenciones');
    }
}
