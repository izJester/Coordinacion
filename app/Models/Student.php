<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'cedula',
        'email',
        'telefono',
        'direccion',
        'foto',
        'materias',
        'discapacidad',
        'militar',
        'cambio',
        'sexo',
        'embarazo',
        'ingreso',
        'periodo_actual',


    ];

    protected $casts = [
        'materias' => 'array',
        'ingreso' => 'date',
        'periodo_actual' => 'date',
    ];

    public function getDatosAttribute()
    {
        if (empty($this->attributes['materias'])) {
            return false;
        }
        return true;
    }
}
