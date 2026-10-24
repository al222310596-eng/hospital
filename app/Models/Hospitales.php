<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospitales extends Model
{
    use HasFactory;
    protected $table = 'hospitales';
    protected $primaryKey = 'id_hospital';
    protected $fillable = [
        'clave',
        'nombre',
        'activo'
        
    ];

    public function getActivoAttribute($value)
    {
        return $value ? 'activo' : 'Inactivo';
    }
}
