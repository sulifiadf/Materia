<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrdersResource\Pages;
use App\Filament\Resources\OrdersResource\RelationManagers;
use App\Models\Orders;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrdersResource extends Resource
{
    protected static ?string $model = Orders::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('alamat_pengiriman_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('metode_pengiriman_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('metode_pembayaran_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('promo_id')
                    ->numeric(),
                Forms\Components\TextInput::make('nomor_order')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('tanggal_order')
                    ->required(),
                Forms\Components\TextInput::make('subtotal')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('diskon')
                    ->required()
                    ->numeric()
                    ->default(0.00),
                Forms\Components\TextInput::make('biaya_pengiriman')
                    ->required()
                    ->numeric()
                    ->default(0.00),
                Forms\Components\TextInput::make('total_bayar')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('status_pembayaran')
                    ->required(),
                Forms\Components\TextInput::make('status_pesanan')
                    ->required(),
                Forms\Components\Textarea::make('catatan_cust')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('alamat_pengiriman_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('metode_pengiriman_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('metode_pembayaran_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('promo_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nomor_order')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_order')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('subtotal')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('diskon')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('biaya_pengiriman')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('total_bayar')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status_pembayaran'),
                Tables\Columns\TextColumn::make('status_pesanan'),
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrders::route('/create'),
            'edit' => Pages\EditOrders::route('/{record}/edit'),
        ];
    }
}
