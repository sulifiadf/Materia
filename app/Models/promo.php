<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class promo extends Model
{
    protected $table = 'promos';

    protected $primaryKey = 'promo_id';

    protected $fillable = [
        'kode_promo',
        'nama_promo',
        'deskripsi',
        'besar_diskon',
        'tipe_diskon',
        'min_pembelian',
        'max_diskon',
        'tanggal_mulai',
        'tanggal_selesai',
        'status',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'promo_id');
    }

    
}
