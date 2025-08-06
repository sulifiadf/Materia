<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    protected $table = 'orders';

    protected $primaryKey = 'order_id';

    protected $fillable = [
        'user_id',
        'alamat_pengiriman_id',
        'metode_pengiriman_id',
        'metode_pembayaran_id',
        'promo_id',
        'nomor_order',
        'tanggal_order',
        'subtotal',
        'diskon',
        'biaya_pengiriman',
        'total_bayar',
        'status_pembayaran',
        'status_pesanan',
        'catatan_cust',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function alamatPengiriman()
    {
        return $this->belongsTo(AlamatPengirimans::class, 'alamat_pengiriman_id');
    }

    public function metodePengiriman()
    {
        return $this->belongsTo(MetodePengiriman::class, 'metode_pengiriman_id');
    }

    public function metodePembayaran()
    {
        return $this->belongsTo(MetodePembayaran::class, 'metode_pembayaran_id');
    }

    public function promo()
    {
        return $this->belongsTo(promo::class, 'promo_id');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }

    protected function casts(): array
    {
        return [
            'tanggal_order' => 'datetime',
            'subtotal' => 'decimal:2',
            'diskon' => 'decimal:2',
            'biaya_pengiriman' => 'decimal:2',
            'total_bayar' => 'decimal:2',
        ];
    }

    protected $attributes = [
        'status_pembayaran' => 'belum_bayar',
        'status_pesanan' => 'pending',
    ];

    
}
