<?php

namespace App\Http\Livewire\Estudiante;

use Livewire\Component;
use Filament\Forms;
use Illuminate\Contracts\View\View;
use App\Models\Materia;
use App\Models\Student;
use Closure;

class Actualizar extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms; 

    public Student $student;

    public function mount(): void 
    {
        $this->form->fill();
    }
    
    protected function getFormSchema(): array
    {
        return [

            Forms\Components\Grid::make(['default' => 2,])
                ->schema([

                    Forms\Components\Repeater::make('materias')
                        ->label('Materias que inscribiste')
                        ->schema([
                            Forms\Components\Select::make('semestre')
                                ->options([
                                    '1' => '1',
                                    '2' => '2',
                                    '3' => '3',
                                    '4' => '4',
                                    '5' => '5',
                                    '6' => '6',
                                    '7' => '7',
                                    '8' => '8',
                                ])
                                ->required(),
                            Forms\Components\Select::make('materia')
                                ->options(Materia::all()->pluck('nombre', 'nombre'))
                                ->required(),
                        ])
                        ->createItemButtonLabel('Otra')
                        ->columns(2)
                        ->columnSpan(2),
                    Forms\Components\TextInput::make('telefono')
                        ->required(),
                    Forms\Components\TextInput::make('direccion')
                        ->required(),
                    Forms\Components\Toggle::make('discapacidad')
                        ->label('Posees alguna discapacidad?')
                        ->inline(false),
                    Forms\Components\Toggle::make('militar')
                        ->label('Eres militar?')
                        ->inline(false),
                    Forms\Components\Toggle::make('cambio')
                        ->label('Has realizado algun cambio de carrera / turno / nucleo')
                        ->inline(false),
                    Forms\Components\Select::make('sexo')
                        ->label('Sexo')
                        ->reactive()
                        ->options([
                            'M' => 'Masculino',
                            'F' => 'Femenino',
                        ]),
                    Forms\Components\Toggle::make('embarazo')
                        ->label('Estas embarazada?')
                        ->inline(false)
                        ->columnSpan(2)
                        ->hidden(fn (Closure $get) => $get('sexo') !== 'F'),
                    Forms\Components\DatePicker::make('ingreso')
                        ->label('Fecha de ingreso')
                        ->required()
                        ->columnSpan(2),
                    Forms\Components\DatePicker::make('periodo_actual')
                        ->label('Periodo academico actual')
                        ->required()
                        ->columnSpan(2),
                ]),
            
        ];
    }

    public function submit(): void
    {
        $this->student->update($this->form->getState());
        dd($this->student);
    }

    public function render(): View
    {
        return view('livewire.estudiante.actualizar');
    }
}
