<?php

namespace App\Filament\Resources\StudentHasClassResource\Pages;

use App\Filament\Resources\StudentHasClassResource;
use App\Models\home_room;
use App\Models\Periode;
use App\Models\Student;
use App\Models\student_has_class;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Resources\Pages\Page;

class FormStudentHasClass extends Page implements HasForms
{

    use InteractsWithForms;

    protected static string $resource = StudentHasClassResource::class;

    protected static string $view = 'filament.resources.student-has-class-resource.pages.form-student-has-class';

    public $students = [];

    public $homerooms = '';

    public $periode = '';

    public function mount(): void
    {
        $this->form->fill();
    }

    public function getFormSchema(): array
    {
        return [
            Card::make()
                ->schema([
                    Select::make('students')
                        ->multiple()
                        ->label('Nama Student')
                        ->options(Student::all()->pluck('name', 'id')),
                    Select::make('homerooms')
                        ->options(home_room::all()->pluck('classrooms.name', 'id'))
                        ->label('Class'),
                    Select::make('periode')
                        ->options(Periode::all()->pluck('name', 'id'))
                        ->label('Periode')
                        ->searchable()
                ])->columns(3)
        ];
    }

    public function save()
    {
        $students = $this->students;
        $insert = [];
        foreach ($students as $row) {
            array_push($insert, [
                'students_id' => $row,
                'homerooms_id' => $this->homerooms,
                'periodes_id' => $this->periode,
                'is_open' => 1,
            ]);
        }
        student_has_class::insert($insert);

        return redirect()->to('admin/data-murid-kelas');
    }
}
