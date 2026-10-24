<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pacientes;

class ControladorPacientes extends Controller {
    public function pacientes() {
        return view('pacientes')->with(['pacientes' => Pacientes::all()]);
    }

    public function paciente_alta(){
        return view('paciente_alta');
    }

    public function paciente_registrar(Request $request){
        $request->validate([
            'clave' => 'required',
            'nombre' => 'required',
            'app' => 'required',
            'fn' => 'required',
            'sexo' => 'required'
        ]);
        if ($request->file('foto') != '' ){
            $file = $request->file('foto');
            $img3 = $file->getClientOriginalName();
            $ldate = date('Ymd_His_');
            $img4 = $ldate . $img3;
            \Storage::disk('local')->put($img4, \File::get($file));

        } else {
            $img4 = "logo_paciente.png"; 
        }
        
        Pacientes::create([
            'clave' => $request->input('clave'),
            'nombre' => $request->input('nombre'),
            'app' => $request->input('app'),
            'fn' => $request->input('fn'),
            'sexo' => $request->input('sexo'),
            'foto' => $img4,
            'email' => $request->input('email'),
            'activo' => $request->input('activo') ? 1 : 0,
        ]);
        
        return redirect()->route('pacientes'); // Cambiado para redirigir correctamente
    } 

    public function paciente_detalle($id){
        $query = Pacientes::find($id);
        return view('paciente_detalle')->with(['paciente' => $query]);
    }

    public function paciente_editar($id){
        $query = Pacientes::find($id);
        return view("paciente_editar")->with(['paciente' => $query]);
    }

    public function paciente_salvar($id, Request $request){
        if($request->file('foto5') != ''){
            //------------------------------------------------
              //obtener el campo file definido en el formulario
              $file = $request->file('foto5');
              //obtenemos el nombre del archivo file
                  $img3 = $file->getClientOriginalName();
                 //$img = $request->file('img1')->getClientOriginalName();
              //obtener fecha y hora
                  $ldate = date('Ymd_His_');     //obtenemos fecha y hora
                  $img4 = $ldate . $img3;         //concatena la fecha y hora con el nomnre del archivo file (file)
               //indicamos el nombre y la ruta donde se almacena el archivo file
                  \Storage::disk('local')->put($img4, \File::get($file));
           //---------------------- 
   }
   else{
          $img4 = $request->foto4;
   }
        $query = Pacientes::find($id);
        $query->clave = $request->clave;
        $query->nombre = $request->nombre;
        $query->app = $request->app;
        $query->fn = $request->fn;
        $query->sexo = $request->sexo; 
        $query -> foto = $img4;      
        $query->activo = $request->activo;
        $query->save();

        return redirect()->route("paciente_editar", ['id' => $id]);
    }

    public function paciente_borrar($id){
        $hospital = Pacientes::find($id);
        $hospital->delete();
        return redirect()->route('pacientes');
    }
}

