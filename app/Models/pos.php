<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pos extends Model
{
    protected $table = 'pos';

    protected $primaryKey = 'pos_id';

    protected $fillable = [
        'metode_pembayaran_id',
        'subtotal',
        'diskon',
        'total',
        'uang_dibayar',
        'kembalian',
    ];

    public function metodePembayaran()
    {
        return $this->belongsTo(MetodePembayaran::class, 'metode_pembayaran_id');
    }

    public function pos_details()
    {
        return $this->hasMany(PosDetail::class, 'pos_id');
    }
}
