<?php

namespace App\Filament\Resources\JenisWisataResource\Pages;

use App\Filament\Resources\JenisWisataResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateJenisWisata extends CreateRecord
{
    protected static string $resource = JenisWisataResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
