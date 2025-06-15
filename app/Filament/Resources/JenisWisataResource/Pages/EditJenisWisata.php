<?php

namespace App\Filament\Resources\JenisWisataResource\Pages;

use App\Filament\Resources\JenisWisataResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJenisWisata extends EditRecord
{
    protected static string $resource = JenisWisataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
