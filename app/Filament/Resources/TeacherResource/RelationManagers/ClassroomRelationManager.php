<?php

namespace App\Filament\Resources\TeacherResource\RelationManagers;

use App\Models\Classroom;
use App\Models\Periode;
use Filament\Forms;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Set;

use function Laravel\Prompts\select;

class ClassroomRelationManager extends RelationManager
{
    protected static string $relationship = 'classroom'; // -> 'classroom'  harus sesuai dengan nama fungsi relasi yang ada di model utama yaitu method relasi di modedl utama. 

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('classrooms_id')
                    ->required()
                    ->options(Classroom::all()->pluck('name', 'id'))
                    ->native(false) // untuk menggantikan bentuk option agar kelihatan
                    ->label('Kelas')
                    ->placeholder('Select Class')
                    ->relationship(name: 'classrooms', titleAttribute: 'name') // relasi tersebut untuk membuatkan relasi di dalam function createoptionform 
                    ->createOptionForm([ // membuat Form untuk menambhkan data baru didalam Form Has_room
                        TextInput::make('name')
                            ->label('Nama Kelas')
                            ->reactive()
                            ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', \Str::slug($state)))
                            ->required(),
                        TextInput::make('slug')
                            ->label('Slug')
                            ->readOnly(),
                        // Hidden::make('slug') // bisa menggunakan Hidden untuk menghilangkan field slug
                    ])
                    ->createOptionAction(function (Action $action) { // function ini untuk mensettings modal yang dibuat dari modal "Add Classroom" baru
                        return $action
                            ->modalHeading('Add Classroom')
                            ->modalButton('Add Classroom')
                            ->modalWidth('2xl');
                    }),
                Select::make('periodes_id')
                    ->required()
                    ->options(Periode::all()->pluck('name', 'id'))
                    ->label("Periode")
                    ->native(false)
                    ->placeholder('Select Periode')
                    ->relationship(name: 'periodes', titleAttribute: 'name')
                    ->createOptionForm([
                        TextInput::make('name')
                            ->label('Periode')
                            ->required()
                            ->placeholder('Masukkan Periode')
                    ])
                    ->createOptionAction(function (Action $action) {
                        return $action
                            ->modalHeading('Add Periode')
                            ->modalButton('Add Periode')
                            ->modalWidth('2xl');
                    }),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                TextColumn::make('classrooms.name'),
                TextColumn::make('periodes.name'),
                ToggleColumn::make('is_open')
                    ->label("Open")
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
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }
}
