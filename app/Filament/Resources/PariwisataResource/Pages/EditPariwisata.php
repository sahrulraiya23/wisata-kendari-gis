<?php

namespace App\Filament\Resources\PariwisataResource\Pages;

use Filament\Actions;
use Illuminate\Support\Facades\Storage;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\PariwisataResource;

class EditPariwisata extends EditRecord
{
    protected static string $resource = PariwisataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    // Simpan path gambar lama sebelum proses update
    protected ?string $oldImagePath = null;

    protected function beforeSave(): void
    {
        // Ambil path gambar sebelum diupdate
        $this->oldImagePath = $this->record->getOriginal('gambar');
    }

    protected function afterSave(): void
    {
        // Hapus gambar lama hanya jika:
        // 1. Ada path gambar lama yang tersimpan
        // 2. Gambar lama berbeda dengan gambar baru
        if (
            $this->oldImagePath &&
            $this->oldImagePath !== $this->record->gambar
        ) {
            Storage::disk('public')->delete($this->oldImagePath);
        }
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
