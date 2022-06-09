<?php

namespace App\Filament\Resources\MateriaResource\Pages;

use App\Filament\Resources\MateriaResource;
use Filament\Resources\Pages\Page;
use App\Models\Materia;

class VerMateria extends Page
{
    protected static string $resource = MateriaResource::class;

    public Materia $record;

    protected static string $view = 'filament.resources.materia-resource.pages.ver-materia';
}
