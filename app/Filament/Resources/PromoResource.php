<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PromoResource\Pages;
use App\Filament\Resources\PromoResource\RelationManagers;
use App\Models\Promo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PromoResource extends Resource
{
    protected static ?string $model = Promo::class;

    protected static ?string $navigationGroup = 'Manajemen Pesanan';

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('kode_promo')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nama_promo')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('deskripsi')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('besar_diskon')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('tipe_diskon')
                    ->required(),
                Forms\Components\TextInput::make('min_pembelian')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('max_penggunaan')
                    ->required()
                    ->numeric()
                    ->default(1),
                Forms\Components\DateTimePicker::make('tanggal_mulai')
                    ->required(),
                Forms\Components\DateTimePicker::make('tanggal_selesai')
                    ->required(),
                Forms\Components\TextInput::make('status')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kode_promo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_promo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('besar_diskon')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tipe_diskon'),
                Tables\Columns\TextColumn::make('min_pembelian')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('max_penggunaan')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tanggal_mulai')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tanggal_selesai')
                    ->dateTime()
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
            'index' => Pages\ListPromos::route('/'),
            'create' => Pages\CreatePromo::route('/create'),
            'edit' => Pages\EditPromo::route('/{record}/edit'),
        ];
    }
}
