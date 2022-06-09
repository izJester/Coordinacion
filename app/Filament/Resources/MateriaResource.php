<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MateriaResource\Pages;
use App\Filament\Resources\MateriaResource\RelationManagers;
use App\Models\Materia;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Forms\Components\TextInput;

class MateriaResource extends Resource
{
    protected static ?string $model = Materia::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('codigo')
                ->required(),
                TextInput::make('nombre')
                ->required(),
                TextInput::make('semestre')
                ->required(),
                TextInput::make('UC')
                ->required(),
                TextInput::make('horasT')
                ->required(),
                TextInput::make('horasP')
                ->required(),
                TextInput::make('horasL')
                ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('codigo')
                ->searchable()
                ->label('Codigo'),
                Tables\Columns\TextColumn::make('nombre')
                ->searchable()
                ->label('Nombre'),
                Tables\Columns\TextColumn::make('semestre')
                ->sortable()
                ->searchable()
                ->label('Semestre'),
                Tables\Columns\TextColumn::make('UC')
                ->searchable()
                ->label('UC'),
                Tables\Columns\TextColumn::make('horasT')
                ->searchable()
                ->label('Horas Teorica'),
                Tables\Columns\TextColumn::make('horasP')
                ->searchable()
                ->label('Horas Practica'),
                Tables\Columns\TextColumn::make('horasL')
                ->searchable()
                ->label('Horas Laboratorio'),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('ver')
                    ->label('Ver')
                    ->url(fn (Materia $record): string => route('filament.resources.materias.ver-materia', $record))
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
            'index' => Pages\ListMaterias::route('/'),
            'create' => Pages\CreateMateria::route('/create'),
            'edit' => Pages\EditMateria::route('/{record}/edit'),
            'ver-materia' => Pages\VerMateria::route('/{record}/ver'),

        ];
    }
}
