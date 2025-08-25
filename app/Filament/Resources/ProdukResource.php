<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProdukResource\Pages;
use App\Filament\Resources\ProdukResource\RelationManagers;
use App\Models\Produk;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Components\IconColumn;
use Filament\Tables\Components\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Illuminate\Support\Str;
use Filament\Forms\Set;





class ProdukResource extends Resource
{
    protected static ?string $model = Produk::class;

    protected static ?string $navigationGroup = 'Manajemen Produk';

    protected static ?string $navigationIcon = 'heroicon-o-cube';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([
                    Section::make('Informasi Produk')->schema([
                        TextInput::make('nama_produk')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function(string $operation, $state, Set $set){
                                if($operation !== 'create'){
                                    return;
                                }
                                $set('slug', Str::slug($state));
                            }),

                        TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->disabled()
                            ->dehydrated()
                            ->unique(produk::class, 'slug', ignoreRecord: true),
                        
                        Select::make('kategori_id')
                            ->relationship('kategori', 'nama_kategori')
                            //->searchable()
                            ->required(),
                        
                        TextInput::make('merk')
                            ->required(),

                        Textarea::make('deskripsi')
                            ->columnSpanFull()
                            ->required()
                            ->maxLength(1000),
                    ])->columns(2),

                    Section::make('Images')->schema([
                        Fileupload::make('foto_produk')
                        ->image()
                        ->multiple()
                        ->maxFiles(20)
                        ->directory('products')
                        ->reorderable()
                    ])
                ])->columnSpan(1),

                Group::make()->schema([
                    Section::make('Harga dan Stok')->schema([
                        TextInput::make('harga_beli')
                            ->required()
                            ->numeric()
                            ->prefix('IDR'),
                        
                        TextInput::make('harga_jual')
                            ->required()
                            ->numeric()
                            ->prefix('IDR'),

                        Select::make('promo_id')
                            ->relationship('promo', 'nama_promo')
                            ->label('Promo')
                            ->searchable()
                            ->nullable(),

                        TextInput::make('stok')
                            ->required()
                            ->numeric()
                            ->default(0),

                        Select::make('satuan')
                            ->options([
                                'pcs' => 'Pcs',
                                'meter' => 'Meter',
                                'kg' => 'Kg',
                                'karung' => 'Karung',
                                'dus' => 'Dus',
                            ])
                            ->default('pcs')
                            ->required(),
                        TextInput::make('berat')
                            ->numeric()
                            ->step(0.01)
                            ->suffix('kg'),
                ])->columnSpan(2),
                    
                    Section::make('Status Produk')->schema([
                                                Select::make('status')
                            ->required()
                            ->options([
                                'tersedia' => 'Tersedia',
                                'kosong' => 'Kosong',
                            ])
                            ->default('tersedia'),
                    ])

                
                ])->columns(2),

            ]);
    }
                

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kategori_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nama_produk')
                    ->searchable(),
                Tables\Columns\TextColumn::make('harga_beli')
                    ->money('IDR')
                    ->sortable(),
                Tables\Columns\TextColumn::make('harga_jual')
                    ->money('IDR')
                    ->sortable(),
                Tables\Columns\TextColumn::make('promo_id')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('stok')
                    ->label('Stok')
                    ->numeric()
                    ->sortable()
                    ->badge()
                    ->color(fn ($state): string => match (true) {
                        $state > 50 => 'success',
                        $state > 10 => 'warning',
                        $state > 0 => 'danger',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('satuan'),
                Tables\Columns\TextColumn::make('berat')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('merk')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('foto_produk')
                    ->label('Foto Produk')
                    ->circular()
                    ->size(50)
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'tersedia' => 'success',
                        'kosong' => 'danger',
                        default => 'gray',
                    })
                    ->icon(fn (string $state): string => match ($state) {
                        'tersedia' => 'heroicon-o-check-circle',
                        'kosong' => 'heroicon-o-x-circle',
                        default => 'heroicon-o-question-mark-circle',
                    }),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
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
                SelectFilter::make('kategori_id')
                    ->relationship('kategori', 'nama_kategori')
                    ->multiple(),

                SelectFilter::make('merk')
                
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListProduks::route('/'),
            'create' => Pages\CreateProduk::route('/create'),
            'edit' => Pages\EditProduk::route('/{record}/edit'),
        ];
    }
}
