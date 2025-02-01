<?php

namespace App\Filament\Resources\StudentsResource\Pages;

use App\Filament\Resources\StudentsResource;
use App\Imports\importStudents;
use App\Models\Student;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Facades\Excel;

class ListStudents extends ListRecords
{
    protected static string $resource = StudentsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->icon('heroicon-o-plus-circle'),
        ];
    }

    public function getTitle(): string|Htmlable
    {
        return "Data Students";
    }

    public function getHeader(): ?View
    {
        $data = Actions\CreateAction::make()
        ->icon('heroicon-o-plus-circle');
        return view('filament.custom.upload-file', compact('data')); // compact() adalah cara untuk mengirimkan data ke view
    }

    public $file = '';

    public function save(){ // jangan lupa untuk me install composer require maatwebsite/excel
        if($this->file != ''){
            Excel::import(new importStudents, $this->file);
        } else {
            return redirect()->back()->with('error', 'Please select a file');
        }
        // testing data apakah bisa masuk
        // Student::create([
        //     'nis' =>'123',
        //     'name' => 'TryFirst',
        //     'gender' => 'Male',
        // ]);
    }
}
