<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicos extends Model
{
    use HasFactory;
    protected $table = 'medicos';
    protected $primaryKey = 'id_medico';
    protected $fillable = [
        'clave',
        'nombre',
        'app',
        'fn',
        'sexo',
        'foto',
        'email',
        'activo'
        
    ];

    public function getActivoAttribute($value)
    {
        return $value ? 'activo' : 'Inactivo';
    }
}
