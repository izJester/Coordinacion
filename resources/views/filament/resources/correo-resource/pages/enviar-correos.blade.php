<x-filament::page>

<form wire:submit.prevent="submit">
    {{ $this->form }}
 
    <x-filament::button class=" mt-4" type="submit">
        Enviar Formulario a todos los Estudiantes
    </x-filament::button>

</x-filament::page>
