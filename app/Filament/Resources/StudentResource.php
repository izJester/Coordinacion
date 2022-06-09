<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentResource\Pages;
use App\Filament\Resources\StudentResource\RelationManagers;
use App\Models\Student;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use App\Models\Materia;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')->required(),
                Forms\Components\TextInput::make('apellido')->required(),
                Forms\Components\TextInput::make('cedula')->required(),
                Forms\Components\TextInput::make('email')->email()->required(),
                //Forms\Components\TextInput::make('telefono')->required(),
                //Forms\Components\TextInput::make('direccion')->required(),
                //Forms\Components\Select::make('materia_id')
                //->required()
                //->label('Materia')
                //->options(Materia::all()->pluck('nombre', 'id')),
                //Forms\Components\FileUpload::make('foto')->image(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //Tables\Columns\ImageColumn::make('foto')->rounded()->size(50),
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
                Tables\Columns\BooleanColumn::make('datos')
                ->label('Pre-Inscripcion'),
               
            ])
            ->filters([
                //
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
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }
}
