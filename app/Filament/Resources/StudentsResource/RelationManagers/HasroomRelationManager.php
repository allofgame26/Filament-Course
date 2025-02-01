<?php

namespace App\Filament\Resources\StudentsResource\RelationManagers;

use App\Models\Classroom;
use App\Models\home_room;
use App\Models\Periode;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HasroomRelationManager extends RelationManager
{
    protected static string $relationship = 'hasroom';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('homerooms_id')
                    ->options(home_room::all()->pluck('classrooms.name', 'id'))
                    ->label('Kelas')
                    ->placeholder("Pilih Kelas")
                    ->required()
                    ->searchable(),
                Select::make('periodes_id')
                    ->options(Periode::all()->pluck('name', 'id'))
                    ->label('Periode')
                    ->placeholder('Pilih Periode')
                    ->required()
                    ->searchable(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                TextColumn::make('homerooms.classrooms.name'),
                TextColumn::make('periodes.name')
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateHeading('Tidak Ada Kelas yang dihadiri')
            ->emptyStateDescription('Kelas yang dihadiri akan muncul di sini')
            ->emptyStateIcon('heroicon-o-x-circle')
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }
}
