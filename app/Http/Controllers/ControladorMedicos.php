<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicos;

class ControladorMedicos extends Controller {
    public function medicos() {
        return view('medicos')->with(['medicos' => Medicos::all()]);
    }

    public function medico_alta(){
        return view('medico_alta');
    }

    public function medico_registrar(Request $request){
        $request->validate([
            'clave' => 'required',
            'nombre' => 'required',
            'app' => 'required',
            'fn' => 'required',
            'sexo' => 'required',
            'email' => 'required'
        ]);
        if ($request->file('foto') != '' ){
            $file = $request->file('foto');
            $img = $file->getClientOriginalName();
            $ldate = date('Ymd_His_');
            $img2 = $ldate . $img;
            \Storage::disk('local')->put($img2, \File::get($file));

        } else {
            $img2 = "logo_medico.png"; 
        }
        
        Medicos::create([
            'clave' => $request->input('clave'),
            'nombre' => $request->input('nombre'),
            'app' => $request->input('app'),
            'fn' => $request->input('fn'),
            'sexo' => $request->input('sexo'),
            'foto' => $img2,
            'email' => $request->input('email'),
            'activo' => $request->input('activo') ? 1 : 0,
        ]);
        
        return redirect()->route('medicos'); // Cambiado para redirigir correctamente
    } 

    public function medico_detalle($id){
        $query = Medicos::find($id);
        return view('medico_detalle')->with(['medico' => $query]);
    }

    public function medico_editar($id){
        $query = Medicos::find($id);
        return view("medico_editar")->with(['medico' => $query]);
    }

    public function medico_salvar($id, Request $request){
        if($request->file('foto1') != ''){
            //------------------------------------------------
              //obtener el campo file definido en el formulario
              $file = $request->file('foto1');
              //obtenemos el nombre del archivo file
                  $img = $file->getClientOriginalName();
                 //$img = $request->file('img1')->getClientOriginalName();
              //obtener fecha y hora
                  $ldate = date('Ymd_His_');     //obtenemos fecha y hora
                  $img2 = $ldate . $img;         //concatena la fecha y hora con el nomnre del archivo file (file)
               //indicamos el nombre y la ruta donde se almacena el archivo file
                  \Storage::disk('local')->put($img2, \File::get($file));
           //---------------------- 
   }
   else{
          $img2 = $request->foto2;
   }
        $query = Medicos::find($id);
        $query->clave = $request->clave;
        $query->nombre = $request->nombre;
        $query->app = $request->app;
        $query->fn = $request->fn;
        $query->sexo = $request->sexo;
        $query->email = $request->email; 
        $query -> foto = $img2;      
        $query->activo = $request->activo;
        $query->save();

        return redirect()->route("medico_editar", ['id' => $id]);
    }

    public function medico_borrar($id){
        $hospital = Medicos::find($id);
        $hospital->delete();
        return redirect()->route('medicos');
    }
}

