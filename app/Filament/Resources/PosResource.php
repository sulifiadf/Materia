<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PosResource\Pages;
use App\Filament\Resources\PosResource\RelationManagers;
use App\Models\Pos;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PosResource extends Resource
{
    protected static ?string $model = Pos::class;

    protected static ?string $navigationGroup = 'Transaksi';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('subtotal')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('diskon')
                    ->required()
                    ->numeric()
                    ->default(0.00),
                Forms\Components\TextInput::make('total')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('uang_dibayar')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('kembalian')
                    ->required()
                    ->numeric()
                    ->default(0.00),
                Forms\Components\TextInput::make('metode_pembayaran_id')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('subtotal')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('diskon')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('total')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('uang_dibayar')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('kembalian')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('metode_pembayaran_id')
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListPos::route('/'),
            'create' => Pages\CreatePos::route('/create'),
            'edit' => Pages\EditPos::route('/{record}/edit'),
        ];
    }
}
