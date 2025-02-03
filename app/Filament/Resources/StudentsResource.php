<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentsResource\Pages;
use App\Filament\Resources\StudentsResource\RelationManagers;
use App\Filament\Resources\StudentsResource\RelationManagers\ClassRelationManager;
use App\Filament\Resources\StudentsResource\RelationManagers\HasroomRelationManager;
use App\Models\Student;
use App\Models\Students;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use stdClass;
use Symfony\Component\HttpKernel\Profiler\Profile;


class StudentsResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Data Student';

    protected static ?string $slug = "data-student";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('name')
                            ->label("Nama Siswa")
                            ->required(),
                        TextInput::make('nis')
                            ->label("Nomor Induk Siswa")
                            ->required(),
                        Select::make('gender')
                            ->options([
                                'Male' => 'Laki - Laki',
                                'Female' => ' Perempuan'
                            ])
                            ->required()
                            ->placeholder("Pilih Gender")
                            ->native(false),
                        DatePicker::make('birthday')
                            ->label('Tanggal Lahir')
                            ->native(false)
                            ->required(),
                        Select::make('religion')
                            ->options([
                                'Islam' => 'Islam',
                                'Katolik' => 'Katolik',
                                'Protestan' => 'Protestan',
                                'Hindu' => 'Hindu',
                                'Buddha' => 'Buddha',
                                'Khonghucu' => 'Khonghucu'
                            ])
                            ->native(false)
                            ->placeholder('Pilih Agama')
                            ->required(),
                        TextInput::make('contact')
                            ->label('Nomor Kontak')
                            ->required()
                            ->tel(),
                        FileUpload::make('profile')
                            ->required()
                            ->directory('students')
                            ->avatar()
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('index')
                    ->label('No')
                    ->state(
                        static function (HasTable $livewire, stdClass $rowLoop): string {
                            return (string) (
                                $rowLoop->iteration +
                                ($livewire->getTableRecordsPerPage() * (
                                    $livewire->getTablePage() - 1
                                ))
                            );
                        }
                    ),
                ImageColumn::make('profile')
                    ->label('Foto Profil')
                    ->circular(),
                TextColumn::make('name')
                    ->label('Nama Lengkap')
                    ->searchable(),
                TextColumn::make('nis')
                    ->label("Nomor Induk Siswa"),
                TextColumn::make('gender')
                    ->label('Jenis Kelamin'),
                TextColumn::make('birthday')
                    ->date('l d F Y')
                    ->label('Tanggal Lahir'),
                TextColumn::make('religion')
                    ->label('Agama'),
                TextColumn::make('contact')
                    ->label('Nomor Telefon')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            // ->headerActions([
            //     Tables\Actions\CreateAction::make()  // bisa menggunakan ini untuk menambahkan button create data
            //     ->icon('heroicon-o-plus-circle')
            // ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getLabel(): ?string
    {
        $locale = app()->getLocale();

        if($locale == 'id'){
            return 'Murid';
        } else {
            return 'Student';
        }

    }
    
    public static function getRelations(): array
    {
        return [
            // HasroomRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudents::route('/create'),
            'edit' => Pages\EditStudents::route('/{record}/edit'),
        ];
    }
}
