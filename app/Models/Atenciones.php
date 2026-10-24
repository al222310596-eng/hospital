<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Atenciones extends Model
{
    protected $table = 'atencion'; // Cambiar a 'atencion'
    protected $primaryKey = 'id_atencion'; // Define la clave primaria
    protected $fillable = ['id_hospital', 'id_medico', 'id_paciente', 'detalle'];

    // Definir las relaciones
    public function hospital()
    {
        return $this->belongsTo(Hospitales::class, 'id_hospital');
    }

    public function medico()
    {
        return $this->belongsTo(Medicos::class, 'id_medico');
    }

    public function paciente()
    {
        return $this->belongsTo(Pacientes::class, 'id_paciente');
    }
}
