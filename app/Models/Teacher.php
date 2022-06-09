<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
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
        'categoria',
        'materias',
        'horas_trabajo',
        //'materia_id'
    ];

    protected $cast = [
        'materias' => 'array'
    ];
}
