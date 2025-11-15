<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\KunjunganResource\Pages;
use App\Filament\Admin\Resources\KunjunganResource\RelationManagers;
use App\Models\Kunjungan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KunjunganResource extends Resource
{
    protected static ?string $model = Kunjungan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('pasien_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('dokter_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('poliklinik_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('no_antrian')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\DateTimePicker::make('waktu_kedatangan'),
                Forms\Components\DateTimePicker::make('waktu_dilayani'),
                Forms\Components\DateTimePicker::make('waktu_selesai'),
                Forms\Components\Textarea::make('keluhan')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('diagnosa_awal')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('diagnosa_akhir')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('pemeriksaan_fisik')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('vital_sign')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('tindakan')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('jenis_pembiayaan')
                    ->required(),
                Forms\Components\TextInput::make('biaya_kunjungan')
                    ->required()
                    ->numeric()
                    ->default(0.00),
                Forms\Components\TextInput::make('status')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('pasien_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('dokter_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('poliklinik_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('no_antrian')
                    ->searchable(),
                Tables\Columns\TextColumn::make('waktu_kedatangan')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('waktu_dilayani')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('waktu_selesai')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('jenis_pembiayaan'),
                Tables\Columns\TextColumn::make('biaya_kunjungan')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListKunjungans::route('/'),
            'create' => Pages\CreateKunjungan::route('/create'),
            'edit' => Pages\EditKunjungan::route('/{record}/edit'),
        ];
    }
}
