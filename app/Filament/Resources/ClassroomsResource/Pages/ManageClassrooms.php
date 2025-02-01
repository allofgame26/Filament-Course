<?php

namespace App\Filament\Resources\ClassroomsResource\Pages;

use App\Filament\Resources\ClassroomsResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageClassrooms extends ManageRecords
{
    protected static string $resource = ClassroomsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->icon('heroicon-o-plus-circle'),
        ];
    }
}
