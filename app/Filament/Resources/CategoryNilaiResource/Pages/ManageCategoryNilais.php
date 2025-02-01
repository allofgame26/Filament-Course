<?php

namespace App\Filament\Resources\CategoryNilaiResource\Pages;

use App\Filament\Resources\CategoryNilaiResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;
use PhpParser\Node\Expr\Cast\String_;

class ManageCategoryNilais extends ManageRecords
{
    protected static string $resource = CategoryNilaiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->icon('heroicon-o-plus-circle'),
        ];
    }

    public function getTitle(): string{ // function ini untuk memberikan judul pada halaman Main
        return "Category Nilai";
    }
}
