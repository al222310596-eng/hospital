<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hospitales;

class ControladorHospitales extends Controller {
    public function hospitales() {
        // Cambiado 'hospital' a 'hospitales' para que coincida con la vista
        return view('hospitales')->with(['hospitales' => Hospitales::all()]);
    }

    public function hospital_alta(){
        return view('hospital_alta');
    }

    public function hospital_registrar(Request $request){
        $request->validate([
            'clave' => 'required',
            'nombre' => 'required'
        ]);
        
        Hospitales::create([
            'clave' => $request->input('clave'),
            'nombre' => $request->input('nombre'),
            'activo' => $request->input('activo') ? 1 : 0,
        ]);

        return redirect()->route('hospitales'); // Cambiado para redirigir correctamente
    } 

    public function hospital_detalle($id){
        $query = Hospitales::find($id);
        return view('hospital_detalle')->with(['hospital' => $query]);
    }

    public function hospital_editar($id){
        $query = Hospitales::find($id);
        return view("hospital_editar")->with(['hospital' => $query]);
    }

    public function hospital_salvar($id, Request $request){
        $query = Hospitales::find($id);
        $query->clave = $request->clave;
        $query->nombre = $request->nombre;
        $query->activo = $request->activo;
        $query->save();

        return redirect()->route("hospital_editar", ['id' => $id]);
    }

    public function hospital_borrar($id){
        $hospital = Hospitales::find($id);
        $hospital->delete();
        return redirect()->route('hospitales');
    }
}


