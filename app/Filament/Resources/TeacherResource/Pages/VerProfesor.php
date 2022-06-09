<?php

namespace App\Filament\Resources\TeacherResource\Pages;

use App\Filament\Resources\TeacherResource;
use Filament\Resources\Pages\Page;
use App\Models\Teacher;

class VerProfesor extends Page
{
    public Teacher $record;

    protected static string $resource = TeacherResource::class;

    protected static string $view = 'filament.resources.teacher-resource.pages.ver-profesor';
}
