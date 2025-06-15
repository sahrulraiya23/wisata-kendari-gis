<?php

namespace App\Filament\Resources\JenisWisataResource\Pages;

use App\Filament\Resources\JenisWisataResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJenisWisatas extends ListRecords
{
    protected static string $resource = JenisWisataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
