<?php

namespace App\Filament\Resources\CorreoResource\Pages;

use App\Filament\Resources\CorreoResource;
use Filament\Resources\Pages\Page;
use Illuminate\Support\Facades\Mail;
use Filament\Forms;
use App\Models\Student;
use Illuminate\Support\Facades\URL;
use App\Mail\ActualizarEstudiante;

class EnviarCorreos extends Page implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public function mount(): void
    {
        $this->form->fill();
    }

    protected function getFormSchema(): array 
    {
        return [

        ];
    } 

    public function submit(): void 
    {
        $estudiantes = Student::get();
        foreach ($estudiantes as $estudiante) {
            $url = URL::signedRoute('actualizar-informacion' , $estudiante->id);
            Mail::to($estudiante->email)->send(new ActualizarEstudiante($url));
        }

        $this->notify('success', 'Enviado');
    } 


    protected static string $resource = CorreoResource::class;

    protected static string $view = 'filament.resources.correo-resource.pages.enviar-correos';
}
