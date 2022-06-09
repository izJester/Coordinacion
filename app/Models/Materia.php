<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'codigo',
        'semestre',
        'UC',
        'horasT',
        'horasP',
        'horasL',
    ];

    public function student()
    {
        return $this->hasMany(Student::class);
    }

    public function teacher()
    {
        return $this->hasMany(Teacher::class);
    }
}
