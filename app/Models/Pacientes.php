<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pacientes extends Model
{
    use HasFactory;
    protected $table = 'pacientes';
    protected $primaryKey = 'id_paciente';
    protected $fillable = [
        'clave',
        'nombre',
        'app',
        'fn',
        'sexo',
        'foto',
        'activo'
        
    ];

    public function getActivoAttribute($value)
    {
        return $value ? 'activo' : 'Inactivo';
    }
}
