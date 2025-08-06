<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MetodePengiriman extends Model
{
    protected $table = 'metode_pengirimans';

    protected $primaryKey = 'metode_pengiriman_id';

    protected $fillable = [
        'jenis_pengiriman',
        'estimasi_hari',
        'biaya_perKg',
        'status',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'metode_pengiriman_id');
    }
    
}
