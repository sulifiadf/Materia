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
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Set;
use Filament\Forms\Get;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Filament\Resources\OrdersResource\Widgets\OrdersStats;

class OrdersResource extends Resource
{
    protected static ?string $model = Orders::class;

    protected static ?string $navigationGroup = 'Manajemen Pesanan';

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'nomor_order';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([
                    Section::make('Informasi Pesanan')->schema([
                        TextInput::make('nomor_order')
                            ->required()
                            ->unique(Orders::class, 'nomor_order', ignoreRecord: true)
                            ->default(fn () => 'ORD-' . Carbon::now()->format('YmdHis') . '-' . strtoupper(Str::random(4)))
                            ->disabled()
                            ->dehydrated(),
                        
                        DateTimePicker::make('tanggal_order')
                            ->required()
                            ->default(now())
                            ->native(false),

                        Select::make('user_id')
                            ->relationship('user', 'name')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->createOptionForm([
                                Forms\Components\TextInput::make('name')
                                    ->required(),
                                Forms\Components\TextInput::make('email')
                                    ->email()
                                    ->required(),
                            ]),

                        Textarea::make('catatan_cust')
                            ->label('Catatan Customer')
                            ->placeholder('Catatan khusus dari customer...')
                            ->columnSpanFull(),
                    ])->columns(2),

                    Section::make('Alamat & Pengiriman')->schema([
                        Select::make('alamat_pengiriman_id')
                            ->relationship('alamatPengirimans', 'alamat')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->live()
                            ->afterStateUpdated(function ($state, Set $set) {
                                // Auto update shipping cost berdasarkan alamat
                                if ($state) {
                                    $alamat = \App\Models\AlamatPengirimans::find($state);
                                    if ($alamat && $alamat->biaya_pengiriman) {
                                        $set('biaya_pengiriman', $alamat->biaya_pengiriman);
                                    }
                                }
                            }),

                        Select::make('metode_pengiriman_id')
                            ->relationship('metodePengiriman', 'jenis_pengiriman')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->live()
                            ->afterStateUpdated(function ($state, Set $set, Get $get) {
                                // Auto update shipping cost berdasarkan metode
                                if ($state) {
                                    $metode = \App\Models\MetodePengiriman::find($state);
                                    if ($metode && $metode->biaya) {
                                        $currentShipping = $get('biaya_pengiriman') ?? 0;
                                        $set('biaya_pengiriman', $metode->biaya);
                                        
                                        // Recalculate total
                                        $subtotal = $get('subtotal') ?? 0;
                                        $diskon = $get('diskon') ?? 0;
                                        $total = $subtotal - $diskon + $metode->biaya;
                                        $set('total_bayar', $total);
                                    }
                                }
                            }),

                        Select::make('metode_pembayaran_id')
                            ->relationship('metodePembayaran', 'nama_metode')
                            ->searchable()
                            ->preload()
                            ->required(),
                    ])->columns(2),
                ])->columnSpan(2),

                Group::make()->schema([
                    Section::make('Rincian Biaya')->schema([
                        TextInput::make('subtotal')
                            ->required()
                            ->numeric()
                            ->prefix('IDR')
                            ->step(0.01)
                            ->live()
                            ->afterStateUpdated(function ($state, Set $set, Get $get) {
                                $diskon = $get('diskon') ?? 0;
                                $shipping = $get('biaya_pengiriman') ?? 0;
                                $total = $state - $diskon + $shipping;
                                $set('total_bayar', $total);
                            }),

                        TextInput::make('diskon')
                            ->numeric()
                            ->prefix('IDR')
                            ->step(0.01)
                            ->default(0)
                            ->live()
                            ->afterStateUpdated(function ($state, Set $set, Get $get) {
                                $subtotal = $get('subtotal') ?? 0;
                                $shipping = $get('biaya_pengiriman') ?? 0;
                                $total = $subtotal - $state + $shipping;
                                $set('total_bayar', $total);
                            }),

                        TextInput::make('biaya_pengiriman')
                            ->numeric()
                            ->prefix('IDR')
                            ->step(0.01)
                            ->default(0)
                            ->live()
                            ->afterStateUpdated(function ($state, Set $set, Get $get) {
                                $subtotal = $get('subtotal') ?? 0;
                                $diskon = $get('diskon') ?? 0;
                                $total = $subtotal - $diskon + $state;
                                $set('total_bayar', $total);
                            }),

                        TextInput::make('total_bayar')
                            ->required()
                            ->numeric()
                            ->prefix('IDR')
                            ->step(0.01)
                            ->disabled()
                            ->dehydrated(),

                        Select::make('promo_id')
                            ->relationship('promo', 'kode_promo')
                            ->searchable()
                            ->preload()
                            ->placeholder('Pilih promo (opsional)')
                            ->live()
                            ->afterStateUpdated(function ($state, Set $set, Get $get) {
                                if ($state) {
                                    $promo = \App\Models\Promo::find($state);
                                    if ($promo) {
                                        $subtotal = $get('subtotal') ?? 0;
                                        $diskonPromo = ($subtotal * $promo->persentase_diskon) / 100;
                                        $currentDiskon = $get('diskon') ?? 0;
                                        $set('diskon', $currentDiskon + $diskonPromo);
                                        
                                        // Recalculate total
                                        $shipping = $get('biaya_pengiriman') ?? 0;
                                        $total = $subtotal - ($currentDiskon + $diskonPromo) + $shipping;
                                        $set('total_bayar', $total);
                                    }
                                }
                            }),
                    ]),

                    Section::make('Status')->schema([
                        Select::make('status_pembayaran')
                            ->required()
                            ->options([
                                'belum_bayar' => 'Belum Bayar',
                                'sudah_bayar' => 'Sudah Bayar',
                            ])
                            ->default('belum_bayar'),

                        Select::make('status_pesanan')
                            ->required()
                            ->options([
                                'pending' => 'Pending',
                                'diproses' => 'Diproses',
                                'dikirim' => 'Dikirim',
                                'selesai' => 'Selesai',
                                'dibatalkan' => 'Dibatalkan',
                            ])
                            ->default('pending'),
                    ]),
                ])->columnSpan(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nomor_order')
                    ->label('No. Order')
                    ->searchable()
                    ->sortable()
                    ->copyable()
                    ->weight('bold')
                    ->color('primary'),

                Tables\Columns\TextColumn::make('user.name')
                    ->label('Customer')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('tanggal_order')
                    ->label('Tanggal Order')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),

                Tables\Columns\TextColumn::make('total_bayar')
                    ->label('Total')
                    ->money('IDR')
                    ->sortable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('status_pembayaran')
                    ->label('Status Bayar')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'belum_bayar' => 'danger',
                        'sudah_bayar' => 'success',
                        default => 'gray',
                    })
                    ->icon(fn (string $state): string => match ($state) {
                        'belum_bayar' => 'heroicon-o-clock',
                        'sudah_bayar' => 'heroicon-o-check-circle',
                        default => 'heroicon-o-question-mark-circle',
                    }),

                Tables\Columns\TextColumn::make('status_pesanan')
                    ->label('Status Pesanan')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'diproses' => 'info',
                        'dikirim' => 'primary',
                        'selesai' => 'success',
                        'dibatalkan' => 'danger',
                        default => 'gray',
                    })
                    ->icon(fn (string $state): string => match ($state) {
                        'pending' => 'heroicon-o-clock',
                        'diproses' => 'heroicon-o-cog-6-tooth',
                        'dikirim' => 'heroicon-o-truck',
                        'selesai' => 'heroicon-o-check-badge',
                        'dibatalkan' => 'heroicon-o-x-circle',
                        default => 'heroicon-o-question-mark-circle',
                    }),

                Tables\Columns\TextColumn::make('metodePengiriman.nama_metode')
                    ->label('Pengiriman')
                    ->badge()
                    ->color('gray')
                    ->toggleable(),

                Tables\Columns\TextColumn::make('metodePembayaran.nama_metode')
                    ->label('Pembayaran')
                    ->badge()
                    ->color('gray')
                    ->toggleable(),

                Tables\Columns\TextColumn::make('subtotal')
                    ->label('Subtotal')
                    ->money('IDR')
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('diskon')
                    ->label('Diskon')
                    ->money('IDR')
                    ->color('danger')
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('biaya_pengiriman')
                    ->label('Ongkir')
                    ->money('IDR')
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('promo.kode_promo')
                    ->label('Promo')
                    ->badge()
                    ->color('success')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->placeholder('Tidak ada promo'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('status_pembayaran')
                    ->label('Status Pembayaran')
                    ->options([
                        'belum_bayar' => 'Belum Bayar',
                        'sudah_bayar' => 'Sudah Bayar',
                    ]),

                SelectFilter::make('status_pesanan')
                    ->label('Status Pesanan')
                    ->options([
                        'pending' => 'Pending',
                        'diproses' => 'Diproses',
                        'dikirim' => 'Dikirim',
                        'selesai' => 'Selesai',
                        'dibatalkan' => 'Dibatalkan',
                    ]),

                SelectFilter::make('metode_pembayaran_id')
                    ->label('Metode Pembayaran')
                    ->relationship('metodePembayaran', 'nama_metode')
                    ->preload(),

                SelectFilter::make('metode_pengiriman_id')
                    ->label('Metode Pengiriman')
                    ->relationship('metodePengiriman', 'jenis_pengiriman')
                    ->preload(),

                Filter::make('tanggal_order')
                    ->form([
                        Forms\Components\DatePicker::make('dari_tanggal')
                            ->label('Dari Tanggal'),
                        Forms\Components\DatePicker::make('sampai_tanggal')
                            ->label('Sampai Tanggal'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['dari_tanggal'],
                                fn (Builder $query, $date): Builder => $query->whereDate('tanggal_order', '>=', $date),
                            )
                            ->when(
                                $data['sampai_tanggal'],
                                fn (Builder $query, $date): Builder => $query->whereDate('tanggal_order', '<=', $date),
                            );
                    }),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->color('info'),
                Tables\Actions\EditAction::make()
                    ->color('warning'),
                Tables\Actions\DeleteAction::make()
                    ->requiresConfirmation(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->requiresConfirmation(),
                ]),
            ])
            ->defaultSort('tanggal_order', 'desc')
            ->striped()
            ->paginated([10, 25, 50, 100]);
    }

    public static function getRelations(): array
    {
        return [
            // Tambahkan relation managers jika diperlukan
            // RelationManagers\OrderItemsRelationManager::class,
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

    public static function getWidgets(): array
    {
        return [
            OrdersStats::class,
        ];
    }

    public static function getNavigationBadge(): ?string
{
    return static::getModel()::count();
}
}