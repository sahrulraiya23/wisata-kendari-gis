<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JenisWisataResource\Pages;
use App\Models\JenisWisata;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class JenisWisataResource extends Resource
{
    protected static ?string $model = JenisWisata::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    protected static ?string $navigationLabel = 'Jenis Wisata';

    protected static ?string $pluralLabel = 'Data Jenis Wisata';

    protected static ?int $navigationSort = 3;

    protected static ?string $navigationGroup = 'Master Data';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('nama')
                            ->required()
                            ->maxLength(255)
                            ->columnSpan(2),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('pariwisata_count')
                    ->label('Jumlah Wisata')
                    ->badge()
                    ->color('info')
                    ->counts('pariwisata'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y, H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime('d M Y, H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->action(function (JenisWisata $record) {
                        if ($record->pariwisata()->count() > 0) {
                            \Filament\Notifications\Notification::make()
                                ->danger()
                                ->title('Tidak dapat menghapus')
                                ->body('Jenis wisata ini masih digunakan pada data pariwisata.')
                                ->send();
                            return false;
                        }
                        return $record->delete();
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('nama', 'asc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListJenisWisatas::route('/'),
            'create' => Pages\CreateJenisWisata::route('/create'),
            'edit' => Pages\EditJenisWisata::route('/{record}/edit'),
        ];
    }
}
