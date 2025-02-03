<?php

namespace App\Filament\Resources\TeacherResource\Pages;

use App\Filament\Resources\TeacherResource;
use App\Imports\ImportTeacher;
use Filament\Actions;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Facades\Excel;

class ListTeachers extends ListRecords
{
    protected static string $resource = TeacherResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->icon('heroicon-o-plus-circle'),
        ];
    }

    public function getTitle(): string|Htmlable
    {
        return "Data Teacher";
    }

    public function getHeader(): ?View
    {
        $data = CreateAction::make()
        ->icon('heroicon-o-plus-circle');
        return view('filament.custom.uploadteacher-file', compact('data'));
    }

    public $file = '';

    public function save(){
        if($this->file != ''){
            Excel::import(new ImportTeacher, $this->file);
        } else {
            return redirect()->back()->with('error','Please Select a File');
        }
    }
}
