<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoriPembayaran extends Model
{
    protected $table = 'histori_pembayarans';

    protected $primaryKey = 'histori_pembayaran_id';

    protected $fillable = [
        'user_id',
        'order_id',
        'metode_pembayaran_id',
        'jumlah',
        'status',
        'tanggal_pembayaran',
        'bukti_pembayaran',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function order()
    {
        return $this->belongsTo(orders::class, 'order_id');
    }
    
    public function metodePembayaran()
    {
        return $this->belongsTo(MetodePembayaran::class, 'metode_pembayaran_id');
    }
}
