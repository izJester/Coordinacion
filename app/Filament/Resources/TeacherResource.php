<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeacherResource\Pages;
use App\Filament\Resources\TeacherResource\RelationManagers;
use App\Models\Teacher;
use App\Models\Materia;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class TeacherResource extends Resource
{
    protected static ?string $model = Teacher::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')->required(),
                Forms\Components\TextInput::make('apellido')->required(),
                Forms\Components\TextInput::make('cedula')->required(),
                Forms\Components\TextInput::make('email')->email()->required(),
                Forms\Components\TextInput::make('telefono')->required(),
                Forms\Components\TextInput::make('direccion')->required(),
                Forms\Components\Repeater::make('materias')
                    ->schema([
                        Forms\Components\Select::make('materias')
                            ->required()
                            ->label('Materia')
                            ->options(Materia::all()->pluck('nombre', 'nombre')),
                    ])
                    ->columns(1)
                    ->createItemButtonLabel('Añadir Materia'),
                
                Forms\Components\FileUpload::make('foto')
                    ->image()
                    ->label('Fotocopia de la cedula'),
                Forms\Components\Select::make('categoria')
                    ->required()
                    ->options([
                        'DE' => 'Dedicacion Exclusiva',
                        'TC' => 'Tiempo Completo',
                        'TV' => 'Tiempo Variable',
                        'MT' => 'Medio Tiempo',
                        'I' => 'Instructor'
                    ]),
                Forms\Components\TextInput::make('horas_trabajo')
                    ->label('Horas de Trabajo')
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto')
                ->rounded()
                ->label('Fotocopia de cedula')
                ->size(50),
                Tables\Columns\TextColumn::make('nombre')
                ->searchable()
                ->label('Nombres'),
                Tables\Columns\TextColumn::make('apellido')
                ->searchable()
                ->label('Apellidos'),
                Tables\Columns\TextColumn::make('cedula')
                ->searchable()
                ->label('Cédula'),
                Tables\Columns\TextColumn::make('email')
                ->searchable()
                ->label('Email'),
                Tables\Columns\TextColumn::make('telefono')
                ->searchable()
                ->label('Teléfono'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('ver')
                    ->label('Ver')
                    ->url(fn (Teacher $record): string => route('filament.resources.teachers.ver-profesor', $record))
                    ->icon('heroicon-s-eye')
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTeachers::route('/'),
            'create' => Pages\CreateTeacher::route('/create'),
            'edit' => Pages\EditTeacher::route('/{record}/edit'),
            'ver-profesor' => Pages\VerProfesor::route('/{record}/ver')
        ];
    }
}
