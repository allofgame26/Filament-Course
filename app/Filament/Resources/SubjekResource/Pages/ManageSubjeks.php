<?php

namespace App\Filament\Resources\SubjekResource\Pages;

use App\Filament\Resources\SubjekResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageSubjeks extends ManageRecords
{
    protected static string $resource = SubjekResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
