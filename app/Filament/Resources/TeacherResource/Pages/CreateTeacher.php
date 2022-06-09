<?php

namespace App\Filament\Resources\TeacherResource\Pages;

use App\Filament\Resources\TeacherResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use App\Models\Teacher;

class CreateTeacher extends CreateRecord
{
    protected static string $resource = TeacherResource::class;

    protected function handleRecordCreation(array $data): Model
    {


        return static::getModel()::create([
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'cedula' => $data['cedula'],
            'email' => $data['email'],
            'telefono' => $data['telefono'],
            'direccion' => $data['direccion'],
            'foto' => $data['foto'],
            'categoria' => $data['categoria'],
            'materias' => json_encode($data['materias']),
            'horas_trabajo' => $data['horas_trabajo'],

        ]);

    }
}
