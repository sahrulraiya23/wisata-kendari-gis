<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Kecamatan;
use App\Models\Pariwisata;
use Filament\Tables\Table;
use App\Models\JenisWisata;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
use App\Filament\Resources\PariwisataResource\Pages;

class PariwisataResource extends Resource
{
    protected static ?string $model = Pariwisata::class;

    protected static ?string $navigationIcon = 'heroicon-o-map-pin';

    protected static ?string $navigationLabel = 'Pariwisata';

    protected static ?string $pluralLabel = 'Data Pariwisata';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Dasar')
                    ->schema([
                        Forms\Components\TextInput::make('nama')
                            ->required()
                            ->maxLength(255)
                            ->columnSpan(2),

                        Forms\Components\Select::make('jenis_id')
                            ->label('Jenis Wisata')
                            ->options(JenisWisata::all()->pluck('nama', 'id'))
                            ->required()
                            ->searchable()
                            ->preload(),

                        Forms\Components\Select::make('kecamatan_id')
                            ->label('Kecamatan')
                            ->options(Kecamatan::all()->pluck('nama', 'id'))
                            ->required()
                            ->searchable()
                            ->preload(),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Alamat & Deskripsi')
                    ->schema([
                        Forms\Components\TextInput::make('alamat')
                            ->required()
                            ->maxLength(255)
                            ->columnSpan(2),

                        Forms\Components\RichEditor::make('deskripsi')
                            ->required()
                            ->columnSpan(2),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Koordinat & Rating')
                    ->schema([
                        Forms\Components\TextInput::make('latitude')
                            ->numeric()
                            ->required()
                            ->step(0.000001)
                            ->minValue(-90)
                            ->maxValue(90)
                            ->placeholder('-6.200000'),

                        Forms\Components\TextInput::make('longitude')
                            ->numeric()
                            ->required()
                            ->step(0.000001)
                            ->minValue(-180)
                            ->maxValue(180)
                            ->placeholder('106.816666'),

                        Forms\Components\TextInput::make('rating')
                            ->numeric()
                            ->step(0.1)
                            ->minValue(0)
                            ->maxValue(5)
                            ->placeholder('4.5'),
                    ])
                    ->columns(3),

                Forms\Components\Section::make('Gambar')
                    ->schema([
                        Forms\Components\FileUpload::make('gambar')
                            ->image()
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                '16:9',
                                '4:3',
                                '1:1',
                            ])
                            ->directory('foto-pariwisata')
                            ->visibility('public')
                            ->maxSize(2048)
                            ->columnSpan(2),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('gambar')
                    ->label('Gambar')
                    ->circular()
                    ->size(60),

                Tables\Columns\TextColumn::make('nama')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('jenis.nama')
                    ->label('Jenis')
                    ->badge()
                    ->color('info')
                    ->sortable(),

                Tables\Columns\TextColumn::make('kecamatan.nama')
                    ->label('Kecamatan')
                    ->badge()
                    ->color('success')
                    ->sortable(),

                Tables\Columns\TextColumn::make('alamat')
                    ->searchable()
                    ->limit(50)
                    ->tooltip(function (Tables\Columns\TextColumn $column): ?string {
                        $state = $column->getState();
                        if (strlen($state) <= 50) {
                            return null;
                        }
                        return $state;
                    }),

                Tables\Columns\TextColumn::make('rating')
                    ->badge()
                    ->color(fn(string $state): string => match (true) {
                        $state >= 4.5 => 'success',
                        $state >= 4.0 => 'warning',
                        $state >= 3.0 => 'info',
                        default => 'danger',
                    })
                    ->icon('heroicon-m-star')
                    ->sortable(),

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
                Tables\Filters\SelectFilter::make('jenis_id')
                    ->label('Jenis Wisata')
                    ->options(JenisWisata::all()->pluck('nama', 'id'))
                    ->searchable()
                    ->preload(),

                Tables\Filters\SelectFilter::make('kecamatan_id')
                    ->label('Kecamatan')
                    ->options(Kecamatan::all()->pluck('nama', 'id'))
                    ->searchable()
                    ->preload(),

                Tables\Filters\Filter::make('rating_tinggi')
                    ->label('Rating Tinggi (≥ 4.0)')
                    ->query(fn(Builder $query): Builder => $query->where('rating', '>=', 4.0))
                    ->indicator('Rating ≥ 4.0'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()->after(function (Pariwisata $record) {
                if ($record->gambar) {
                    Storage::disk('public')->delete($record->gambar);
                }
            }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                \Filament\Infolists\Components\Section::make('Informasi Umum')
                    ->schema([
                        TextEntry::make('nama')
                            ->label('Nama Wisata')
                            ->weight('bold')
                            ->size('lg'),

                        TextEntry::make('jenis.nama')
                            ->label('Jenis Wisata')
                            ->badge()
                            ->color('info'),

                        TextEntry::make('kecamatan.nama')
                            ->label('Kecamatan')
                            ->badge()
                            ->color('success'),

                        TextEntry::make('alamat')
                            ->label('Alamat'),

                        TextEntry::make('rating')
                            ->label('Rating')
                            ->badge()
                            ->color(fn(string $state): string => match (true) {
                                $state >= 4.5 => 'success',
                                $state >= 4.0 => 'warning',
                                $state >= 3.0 => 'info',
                                default => 'danger',
                            })
                            ->icon('heroicon-m-star'),
                    ])
                    ->columns(2),

                \Filament\Infolists\Components\Section::make('Deskripsi')
                    ->schema([
                        TextEntry::make('deskripsi')
                            ->html()
                            ->columnSpan(2),
                    ])
                    ->columns(2),

                \Filament\Infolists\Components\Section::make('Koordinat')
                    ->schema([
                        TextEntry::make('latitude')
                            ->label('Latitude')
                            ->copyable()
                            ->icon('heroicon-m-map-pin'),

                        TextEntry::make('longitude')
                            ->label('Longitude')
                            ->copyable()
                            ->icon('heroicon-m-map-pin'),
                    ])
                    ->columns(2),

                \Filament\Infolists\Components\Section::make('Gambar')
                    ->schema([
                        ImageEntry::make('gambar')
                            ->hiddenLabel()
                            ->size(400),
                    ])
                    ->collapsible(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPariwisatas::route('/'),
            'create' => Pages\CreatePariwisata::route('/create'),
            'edit' => Pages\EditPariwisata::route('/{record}/edit'),
        ];
    }
}
