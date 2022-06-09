<?php

namespace App\Filament\Resources\CorreoResource\Pages;

use App\Filament\Resources\CorreoResource;
use Filament\Resources\Pages\Page;
use Filament\Forms;
use App\Models\Student;
use Closure;

class UpdateStudent extends Page implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public function mount(): void
    {
        $this->form->fill();
    }

    protected function getFormSchema(): array 
    {
        return [
            Forms\Components\TextInput::make('cedula')
                ->label('Ingresa tu Cedula')
                ->reactive(),
 
                Forms\Components\TextInput::make('newPasswordConfirmation')
                ->password()
                ->hidden(fn (Closure $get) => $get('newPassword') == null)
        ];
    } 

    public function submit(): void 
    {
        
    } 

    protected static string $resource = CorreoResource::class;

    protected static string $view = 'filament.resources.correo-resource.pages.update-student';
}
